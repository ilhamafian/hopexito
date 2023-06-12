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
        session()->flash('message', 'Product Deleted');
        return redirect()->route('admin.products');
    }

    // export product image
    public function exportFront($id)
    {
        $product = Product::findOrFail($id);
        $imageFileName = $product->image_front;
        $imageFilePath = 'app/public/image-front/' . $imageFileName;

        return response()->download(storage_path($imageFilePath));
    }

    public function exportBack($id)
    {
        $product = Product::findOrFail($id);
        $imageFileName = $product->image_back;
        $imageFilePath = 'app/public/image-back/' . $imageFileName;

        return response()->download(storage_path($imageFilePath));
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('title', 'like', $search)->select('id', 'title', 'slug', 'status', 'sold', 'image_front', 'image_back')->get();
        $tags = Product::pluck('tags')->map(function ($item) {
            return str_getcsv($item);
        })->flatten();
        $tagCounts = $tags->countBy();
        $popularTags = $tagCounts->sortDesc()->take(20);
        $totalProducts = Product::count();
        $totalSold = ProductOrder::sum('quantity');
        $averagePrice = Product::average('price');
        $totalTemplates = ProductTemplate::count();
        $totalCollection = ProductCollection::count();
        return view('livewire.admin.admin-product', compact('products', 'tags', 'popularTags','totalProducts', 'totalSold', 'averagePrice', 'totalTemplates', 'totalCollection'));
    }
}
