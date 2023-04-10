<?php

namespace App\Http\Livewire\Manage;

use App\Models\Product;
use App\Models\ProductCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageProduct extends Component
{
    use WithFileUploads;

    public $title, $price, $tags, $commission, $search;

    public function previewFront($id){
        $product = Product::findOrFail($id);
        $product->update(['preview' => 0]);

        session()->flash('message', 'Preview Changed To Front');
        return redirect()->route('product.manage');
    }

    public function previewBack($id){
        $product = Product::findOrFail($id);
        $product->update(['preview' => 1]);

        session()->flash('message', 'Preview Changed To Back');
        return redirect()->route('product.manage');
    }
    // add product to collection
    public function addToCollection($product_id, $collection_id)
    {
        $product = Product::findOrFail($product_id);
        $product->update(['collection_id' => $collection_id]);
    }
    // remove product from collection
    public function removeFromCollection($product_id, $collection_id)
    {
        $product = Product::findOrFail($product_id);
        $product->update(['collection_id' => null]);
    }
    // delete entire collection
    public function deleteCollection($id)
    {
        $collection = ProductCollection::findOrFail($id);
        $image_path = $collection->collection_image;
        Storage::delete("collection-image/{$image_path}");
        foreach ($collection->product as $product) {
            $product->update([
                'collection_id' => '',
            ]);
        }
        ProductCollection::where('id', $id)->delete();
        session()->flash('message', 'Collection Deleted');
        return redirect()->route('product.manage');
        
    }
    // edit product by id
    public function editProduct($id)
    {
        $validatedData = $this->validate([
            'title' => 'required|string',
            'tags' => 'required|string',
            'price' => 'required|numeric|min:42'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'title' => $this->title,
            'tags' => $this->tags,
            'price' => $this->price,
            'commission' => $this->price * 0.15,
        ]);

        session()->flash('message', 'Product Updated');
        return redirect()->route('product.manage');
    }
    // pin product to top by id
    public function pinProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 3]);
  
        session()->flash('message', 'Product Pinned');
        return redirect()->route('product.manage');
    }
    // pin product to top by id
    public function unpinProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 1]);

        session()->flash('message', 'Product Unpinned');
        return redirect()->route('product.manage');
    }
    // archive product by id
    public function archiveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 2;
        $product->save();

        session()->flash('message', 'Product Archived');
        return redirect()->route('product.manage');
    }
    // unarchive product by id
    public function unarchiveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        session()->flash('message', 'Product Unarchived');
        return redirect()->route('product.manage');
    }
    // delete product by id
    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        session()->flash('message', 'Product Deleted');
        return redirect()->route('product.manage');
    }
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
    // return id(key) and boolean(value) to identify product in cart
    private function inCart()
    {
        $inCart = [];
        $products = Product::where('shopname', Auth::user()->name)->get();
        foreach ($products as $product) {
            $value = false;
            $productIds = $product->productCart->pluck('id');
            foreach ($product->productCart as $item) {
                if ($productIds->contains($item->id)) {
                    $value = true;
                }
            }
            $inCart[$product->id] = $value;
        }
        return $inCart;
    }
    // forcefill product edit field
    public function forceFill($id)
    {
        $product = Product::findOrFail($id);
        $this->title = $product->title;
        $this->tags = $product->tags;
        $this->price = $product->price;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('shopname', Auth::user()->name)->where('status', '!=', 2)->where('title', 'like', $search)->orderBy('status', 'desc')->get();
        $productCollections = ProductCollection::where('name', Auth::user()->name)->get();
        $archives = Product::where('shopname', Auth::user()->name)->where('status', 2)->get();
        $noArchives = $archives->isEmpty();
        $totalItem = Product::where('name', Auth::user()->name)->sum('sold');
        $totalCommission = $this->totalCommission();
        $inCart = $this->inCart();

        return view('livewire.manage.manage-product', compact('products', 'archives', 'totalItem', 'totalCommission', 'noArchives', 'inCart', 'productCollections'));
    }
}
