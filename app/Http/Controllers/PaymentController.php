<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    private function weight()
    {
        $weight = 0;
        foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
            $weight += $cart->weight;
        }
        return $weight;
    }

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

    private function subtotal()
    {
        $subtotal = 0;
        foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
            $subtotal += $cart->subtotal;
        }
        return $subtotal;
    }

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
            return redirect()->route('profile.show');
        }
        $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
        $delivery = $this->delivery();
        $subtotal = $this->subtotal();
        $total = $this->total();

        return view('cart.show', compact('cart', 'delivery', 'state', 'subtotal', 'total'));
    }

    public function storeBill(Request $request)
    {
        $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();

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

    // private function removeCart($rowId)
    // {
    //     $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
    //     foreach ($cart as $cart) {
    //         Cart::where('id', $rowId)->delete();
    //     }
    // }

    public function redirect(Request $request)
    {
        $bill = $request->all();
        $billplz = $bill['billplz'];
        $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();

        Order::create([
            'billplz_id' => $billplz['id'],
            'collection_id' => config('billplz.collection'),
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'description' => 'Test Subject',
            'amount' => $this->total(),
            'paid' => $billplz['paid'],
            'paid_at' => Carbon::parse($billplz['paid_at']),
            'address' => Auth::user()->address,
            'postcode' => Auth::user()->postcode,
            'state' => Auth::user()->state
        ]);
        // Create order from successful payments.
        foreach ($cart as $cart) {
            ProductOrder::create([
                'id' => $cart->id,
                'billplz_id' => $billplz['id'],
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'size' => $cart->size,
                'color' => $cart->color,
                'product_image' => $cart->product_image,
            ]);
        }
        //Remove Successful Cart
        $deleteCart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
        foreach ($deleteCart as $deleteCart) {
            Cart::where('id', $deleteCart->id)->delete();
        }
        $order = Order::where('email', Auth::user()->email)->orderBy('created_at')->get();
        // $product_order = ProductOrder::where('billplz_id', $order)->get();
        return view('order.index', compact('order'));
    }

    public function order()
    {
        $order = Order::where('email', Auth::user()->email)->orderBy('created_at')->get();
        
        return view('order.index', compact('order'));
    }
}
