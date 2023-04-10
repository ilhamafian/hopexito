<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductOrder;
use App\Models\ProductTemplate;
use Livewire\Component;

class AdminProduct extends Component
{
    public $search;

    // remove product from database
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
        session()->flash('message','Product Deleted');
        return redirect()->route('admin.products');
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('title', 'like', $search)->select('id', 'title','slug','status','sold')->get();
        $tags = Product::pluck('tags')->map(function ($item) {
            return explode(',', $item);
        })->flatten()->unique()->toArray();
        $totalProducts = Product::count();
        $totalSold = ProductOrder::count();
        $averagePrice = Product::average('price');
        $totalTemplates = ProductTemplate::count();
        $totalCollection = ProductCollection::count();
        return view('livewire.admin.admin-product', compact('products','tags','totalProducts','totalSold','averagePrice','totalTemplates','totalCollection'));
    }
}
