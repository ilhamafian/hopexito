<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartComponent extends Component
{
    public $coupon;

    // increase cart quantity by 1
    public function increaseQuantity($rowId)
    {
        $cart = Cart::findOrFail($rowId);
        $quantity = $cart->quantity;
        $cart->update(['quantity' => $quantity + 1, 'subtotal' => $cart->subtotal / $quantity * ($quantity + 1), 'weight' => $cart->weight / $quantity * ($quantity + 1)]);
        return redirect()->back();
    }
    // decrease cart quantity by 1
    public function decreaseQuantity($rowId)
    {
        $cart = Cart::findOrFail($rowId);
        $quantity = $cart->quantity;
        if ($quantity - 1 == 0) {
            return redirect()->back();
        }
        $cart->update(['quantity' => $quantity - 1, 'subtotal' => $cart->subtotal / $quantity * ($quantity - 1), 'weight' => $cart->weight / $quantity * ($quantity - 1)]);
        return redirect()->back();
    }
    // remove cart from database
    public function destroyCart($rowId)
    {
        Cart::where('id', $rowId)->delete();
        return redirect()->back();
    }
    // return total amount of cart
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
        return view('livewire.cart.cart-component', compact('cart', 'total'));
    }
}
