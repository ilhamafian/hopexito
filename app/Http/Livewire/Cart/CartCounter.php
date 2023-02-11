<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    public function render()
    {
        if(Auth::check()){
            $cart_count = Cart::where('email', Auth::user()->email)->count();
        }
        else{
            $cart_count = 0;
        }
        return view('livewire.cart.cart-counter', compact('cart_count'));
    }
}
