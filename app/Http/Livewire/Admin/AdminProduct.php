<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductTemplate;
use Livewire\Component;

class AdminProduct extends Component
{
    public $mockup_image, $commission, $category, $min, $color, $search;

    // remove product from database
    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        session()->flash('message', 'Product Deleted');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('title','like', $search)->get();
        $totalProducts = Product::count();
        $totalSold = Product::sum('sold');
        $averagePrice = Product::average('price');
        $totalTemplates = ProductTemplate::count();
        return view('livewire.admin.admin-product', compact('products','totalProducts','totalSold','averagePrice','totalTemplates'));
    }
}
