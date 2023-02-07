<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use Livewire\Component;

class AdminCarts extends Component
{

    public function render()
    {
        $carts = Cart::orderBy('updated_at','DESC')->get();
        $totalCart = Cart::count();
        $subtotal = Cart::sum('subtotal');
        if($totalCart != 0){
            $avgSubtotal = $subtotal / $totalCart;
        }
        elseif($totalCart == 0){
            $avgSubtotal = 0;
        }
        $sizeDistribution = Cart::selectRaw('size, count(*) as count')->groupBy('size')->get();
        $colorDistribution = Cart::selectRaw('color, count(*) as count')->groupBy('color')->get();

        return view('livewire.admin.admin-carts', compact('carts','totalCart','subtotal','avgSubtotal','sizeDistribution','colorDistribution'));
    }
}
