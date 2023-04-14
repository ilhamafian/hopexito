<?php

namespace App\Http\Livewire\Manage;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageSales extends Component
{
    // return total commission
    private function totalCommission()
    {
        $totalCommission = 0;
        $commission = 0;
        $products = Product::where('shopname', Auth::user()->name)->get();
        foreach ($products as $product) {
            $commission = $product->commission;
            foreach ($product->productOrder as $item) {
                $totalCommission += $commission * $item->quantity;
            }
        }
        return $totalCommission;
    }

    public function render()
    {
        $products = Product::with('productOrder')
            ->where('artist_id', Auth::user()->id)
            ->get();
        $productOrders = ProductOrder::with('order')
            ->whereIn('product_id', $products->pluck('id'))
            ->get();
        $totalItem = Product::where('shopname', Auth::user()->name)->sum('sold');
        $totalCommission = $this->totalCommission();

        return view('livewire.manage.manage-sales', compact('productOrders','totalItem', 'totalCommission'));
    }
}
