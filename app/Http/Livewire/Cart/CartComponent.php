<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use App\Models\Cart;

class CartComponent extends Component
{
    public $coupon;

    // increase cart quantity by 1
    public function increaseQuantity($rowId)
    {
        if(Auth::check()){
            $cart = Cart::findOrFail($rowId);
            $quantity = $cart->quantity + 1;
            $subtotal = $cart->subtotal / $cart->quantity * $quantity;
            $weight = $cart->weight / $cart->quantity * $quantity;
            $cart->update(['quantity' => $quantity, 'subtotal' => $subtotal, 'weight' => $weight]);
            return redirect()->back();
        }
        else {
            $cart = SessionCart::instance('cart');
            $cartItem = $cart->get($rowId);
            $quantity = $cartItem->qty + 1;
            $cart->update($rowId, $quantity);
            return redirect()->back();
        }        
    }
    // decrease cart quantity by 1
    public function decreaseQuantity($rowId)
    {
        if (Auth::check())
        {
            $cart = Cart::findOrFail($rowId);
            $quantity = $cart->quantity - 1;
            $subtotal = $cart->subtotal / $cart->quantity * $quantity;
            $weight = $cart->weight / $cart->quantity * $quantity;
            $cart->update(['quantity' => $quantity, 'subtotal' => $subtotal, 'weight' => $weight]);
            return redirect()->back();
        }
        else {
            $cart = SessionCart::instance('cart');
            $cartItem = $cart->get($rowId);
            $quantity = $cartItem->qty - 1;
            $cart->update($rowId, $quantity);
            return redirect()->back();
        }
        
    }
    // remove cart from database
    public function destroyCart($rowId)
    {   
        if(Auth::check()){
            Cart::where('id', $rowId)->delete();
        }
        else{
            SessionCart::instance('cart')->remove($rowId);
        }
        return redirect()->back();
    }
    // return total amount of cart
    private function total()
    {
        $total = 0;
        if(Auth::check()){
            foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
                $total += $cart->subtotal * $cart->discount;
            }
            return $total;
        }
        else{
            return SessionCart::subtotal();
        }
      
    }

    public function discount($x)
    {
        $carts = Cart::where('email', Auth::user()->email)->get();
        foreach ($carts as $cart) {
            $cart->update([
                'discount' => $x
            ]);
        }
    }

    public function removeDiscount($x)
    {
        $carts = Cart::where('email', Auth::user()->email)->get();
        foreach ($carts as $cart) {
            $cart->update([
                'discount' => $x
            ]);
        }
    }

    public function render()
    {
        if (Auth::check()) {
            $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
            $discount = Cart::where('email', Auth::user()->email)->value('discount');
            $total = $this->total();
        } else {
            $cart = SessionCart::instance('cart')->content();
            $discount = 1;
            $total = $this->total();
        }
        return view('livewire.cart.cart-component', compact('cart', 'total', 'discount'));
    }
}
