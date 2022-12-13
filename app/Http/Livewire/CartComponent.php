<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function increaseQuantity(Cart $cart, $rowId)
    {
        $cart = Cart::get($rowId);
        Cart::update($rowId, $cart->qty + 1);
        return redirect()->back();
    }

    public function decreaseQuantity(Cart $cart, $rowId)
    {
        $cart = Cart::get($rowId);
        if($cart->qty - 1 == 0){
            return redirect()->back();
        }
        else{
            Cart::update($rowId, $cart->qty - 1);
            return redirect()->back();
        }
    }

    public function render()
    {
        $cart = Cart::content();

        return view('livewire.cart-component',compact('cart'));
    }
}