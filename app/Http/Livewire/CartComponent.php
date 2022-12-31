<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $cart = Cart::findOrFail($rowId);
        $quantity = $cart->quantity;
        $cart->update(['quantity' => $quantity + 1, 'subtotal' => $cart->subtotal / $quantity * ($quantity + 1), 'weight' => $cart->weight / $quantity * ($quantity + 1)]);
        return redirect()->back();
    }

    public function decreaseQuantity($rowId)
    {
        $cart = Cart::findOrFail($rowId);
        $quantity = $cart->quantity;
        $cart->update(['quantity' => $quantity - 1, 'subtotal' => $cart->subtotal / $quantity * ($quantity - 1), 'weight' => $cart->weight / $quantity * ($quantity - 1)]);
        return redirect()->back();
    }

    public function destroyCart($rowId)
    {
        Cart::where('id', $rowId)->delete();
        return redirect()->back();
    }

    private function total()
    {
        $total = 0;
        foreach (Cart::where('email', Auth::user()->email)->get() as $cart) {
            $total += $cart->subtotal;
        }
        return $total;
    }

    public function render()
    {
        $cart = Cart::where('email', Auth::user()->email)->orderBy('created_at')->get();
        $total = $this->total();
        return view('livewire.cart-component', compact('cart', 'total'));
    }
}
