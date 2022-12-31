<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    public $showingModal = false;

    public $listeners = [
        'hideMe' => 'hideModal'
    ];
    
    public function showModal(){
        $this->showingModal = true;
    }

    public function hideModal(){
        $this->showingModal = false;
    }

    public function render()
    {
        if(Auth::check()){
            $cart_count = Cart::where('email', Auth::user()->email)->count();
        }
        else{
            $cart_count = 0;
        }
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
