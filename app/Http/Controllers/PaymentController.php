<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    // return cart weight
    private function weight()
    {
        $weight = 0;
        foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
            $weight += $cart->weight;
        }
        return $weight;
    }
    // return delivery based on weight
    private function delivery()
    {
        $delivery = 0;
        $user = User::where('name', Auth::user()->name)->first();
        $state = $user['state'];
        $shipping = Config::get('shipping.price');
        $delivery = $shipping[$state];
        $weight = $this->weight();

        if ($weight > 2000 && $weight < 4000) {
            $delivery  = $delivery + 3;
        } elseif ($weight > 4000 && $weight < 8000) {
            $delivery  = $delivery + 5;
        } elseif ($weight > 8000) {
            $delivery = $delivery + 8;
        }
        return $delivery;
    }
    // return subtotal of cart 
    private function subtotal()
    {
        $subtotal = 0;
        foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
            $subtotal += $cart->subtotal;
        }
        return $subtotal;
    }
    // return total amount
    private function total()
    {
        return $total = $this->subtotal() + $this->delivery();
    }

    public function createBill()
    {
        $user = User::where('name', Auth::user()->name)->first();
        if ($user['state']) {
            $state = $user['state'];
        } else {
            session()->flash('message', 'Please update shipping address');
            return redirect()->route('profile.show');
        }
        $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
        $delivery = $this->delivery();
        $subtotal = $this->subtotal();
        $total = $this->total();

        return view('cart.show', compact('cart', 'delivery', 'state', 'subtotal', 'total'));
    }
    // prompt payment gateway 
    public function storeBill(Request $request)
    {
        $billplz = array(
            'collection_id' => config('billplz.collection'),
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'description' => 'Test Subject',
            'amount' => $this->total() * 100,
            'reference_1_label' => "Bank Code",
            'reference_1' => $request->input('radio'),
            'callback_url' => route('billplz-callback'),
            'redirect_url' => route('billplz-redirect'),
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.billplz-sandbox.com/api/v3/bills');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $billplz);
        curl_setopt($ch, CURLOPT_USERPWD, config('billplz.key') . ':' . 'S-F-eaovMEuHHoCv8nl8nJVA');
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        $obj = json_decode($result);
        $billId = $obj->id;

        return redirect('https://www.billplz-sandbox.com/bills/' . $billId . '?auto_submit=true');
    }
    // Update Wallet
    private function updateCommission(Cart $cart)
    {
        try {
            $product = Product::where('id', $cart->product_id)->first();
            $user = User::where('name', $cart->shopname)->first();
            $wallet = Wallet::where('user_id', $user->id)->first();
            $wallet_balance = $wallet->balance;
            $commission = $wallet->commission + $product->commission * $cart->quantity;
            $balance = $wallet->balance + $product->commission * $cart->quantity;
            $quantity = +$product->sold + $cart->quantity;

            $wallet->update([
                'commission' => $commission,
                'balance' => $balance,
            ]);

            WalletTransaction::create([
                'user_id' => $user->id,
                'wallet_id' => $wallet->id,
                'balance' => $wallet_balance,
                'income' => $product->commission * $cart->quantity,
                'new_balance' => $balance,
                'status' => 3
            ]);

            $product->update([
                'sold' => $quantity
            ]);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
    // Payment gateway redirect
    public function redirect(Request $request)
    {
        try {
            $bill = $request->all();
            $billplz = $bill['billplz'];
            $carts = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
            $deleteCarts = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();

            if ($billplz['paid'] == 'true') {
                // Store order from successful payments.
                Order::create([
                    'id' => $billplz['id'],
                    'collection_id' => config('billplz.collection'),
                    'email' => Auth::user()->email,
                    'name' => Auth::user()->name,
                    'description' => 'Test Subject',
                    'delivery' => $this->delivery(),
                    'status' => 1,
                    'amount' => $this->total(),
                    'paid' => $billplz['paid'],
                    'paid_at' => Carbon::parse($billplz['paid_at']),
                    'address' => Auth::user()->address,
                    'postcode' => Auth::user()->postcode,
                    'state' => Auth::user()->state
                ]);
                // Store products in the order
                foreach ($carts as $cart) {
                    ProductOrder::create([
                        'id' => $cart->id,
                        'billplz_id' => $billplz['id'],
                        'product_id' => $cart->product_id,
                        'title' => $cart->title,
                        'price' => $cart->price,
                        'quantity' => $cart->quantity,
                        'size' => $cart->size,
                        'color' => $cart->color,
                        'product_image' => $cart->product_image,
                    ]);
                    $this->updateCommission($cart);
                }
                //Remove Successful Cart
                foreach ($deleteCarts as $deleteCart) {
                    Cart::where('id', $deleteCart->id)->delete();
                }

                session()->flash('message','Transaction Successful');
                return redirect()->route('order.index');
            }
            else{
                session()->flash('message','Transaction Unsuccessful');
                return redirect()->route('billplz-create');
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}
