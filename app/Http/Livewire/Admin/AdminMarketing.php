<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductOrder;
use App\Models\ProductTemplate;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminMarketing extends Component
{
    public $order_id, $artist_id, $name, $newName;

    public function deleteOrder(){
        $order = Order::find($this->order_id);
        $product_order = ProductOrder::where('billplz_id', $this->order_id)->get();
        if($order){
            $order->delete();
            foreach($product_order as $item){
                $item->delete();
            }
        }

        session()->flash('message', 'Order Deleted');
        return redirect()->route('admin.marketing');
    }

    public function fixName(){
        Product::where('shopname', $this->name)->update(['shopname' => $this->newName]);
        Cart::where('shopname', $this->name)->update(['shopname' => $this->newName]);
        Order::where('name', $this->name)->update(['name' => $this->newName]);
        ProductCollection::where('name', $this->name)->update(['name' => $this->newName]);
        Wallet::where('name', $this->name)->update(['name' => $this->newName]);
        
        session()->flash('message', 'Name Fixed');
        return redirect()->route('admin.marketing');
    }

    // add wallet to artist
    public function addWallet(){
        $user = User::find($this->artist_id);
        if($user){
            Wallet::create([
                'id' => uniqid(8),
                'user_id' => $user->id,
                'name' => $user->name,
                'commission' => 20,
                'balance' => 20,
                'status' => 1
            ]);
        }

        session()->flash('message', 'Wallet Added');
        return redirect()->route('admin.marketing');
    }
    // clear storage cache
    public function clearCache()
    {
        $tf = TemporaryFile::get();
        
        foreach ($tf as $file) {
            $cover_image = storage_path("app/public/cover-image/$file->filename");
            $image_front = storage_path("app/public/image-front/$file->filename");
            $image_back = storage_path("app/public/image-back/$file->filename");
            $collection_image = storage_path("app/public/collection-image/$file->filename");
            $mockup_image = storage_path("app/public/mockup-image/$file->filename");
            
            if(file_exists($cover_image)){
                unlink($cover_image);
                $file->delete();
            }
            elseif(file_exists($image_front)){
                unlink($image_front);
                $file->delete();
            }
            elseif(file_exists($image_back)){
                unlink($image_back);
                $file->delete();
            }
            elseif(file_exists($collection_image)){
                unlink($collection_image);
                $file->delete();
            }
            elseif(file_exists($mockup_image)){
                unlink($mockup_image);
                $file->delete();
            }
        }

        session()->flash('message', 'Cache Cleared');
        return redirect()->route('admin.marketing');
    }
    // public function clearMoreCache(){
    //     $image_front = Product::pluck('image_front');
    //     $image_back = Product::pluck('image_back');

    //     foreach ($image_front as $item) {
    //         $file_image_front = "public/image-front/$item";
    //         if (Storage::exists($file_image_front)) {
    //             Storage::delete($file_image_front);
    //         }
    //     }
        
    //     foreach ($image_back as $item) {
    //         $file_image_back = "public/image-back/$item";
    //         if (Storage::exists($file_image_back)) {
    //             Storage::delete($file_image_back);
    //         }
    //     }

    //     session()->flash('message', 'More Cache Cleared');
    //     return redirect()->route('admin.marketing');
    // }
    // add RM20 to each wallets
    public function add20()
    {
        $wallets = Wallet::get();
        foreach ($wallets as $wallet) {
            WalletTransaction::create([
                'user_id' => $wallet->user_id,
                'wallet_id' => $wallet->id,
                'balance' => $wallet->balance,
                'income' => 20,
                'new_balance' => $wallet->balance + 20,
                'status' => 4
            ]);
            $wallet->update([
                'commission' => $wallet->commission + 20,
                'balance' => $wallet->balance + 20
            ]);
        }
        session()->flash('message', 'Add RM20 Success');
        return redirect()->route('admin.marketing');
    }
    // discount 15% for each products
    public function discount15()
    {
        $products = Product::get();
        foreach ($products as $product) {
            $product->update([
                'discount' => 0.85
            ]);
        }
        session()->flash('message', 'Promo Applied');
        return redirect()->route('admin.marketing');
    }
    // revert the discount applied on each products
    public function revertPromo()
    {
        $products = Product::get();
        foreach ($products as $product) {
            $product->update([
                'discount' => 1.00
            ]);
        }
        session()->flash('message', 'Promo Reverted');
        return redirect()->route('admin.marketing');
    }

    public function render()
    {
        $users = User::where('role_id', 2)->get();
        return view('livewire.admin.admin-marketing', compact('users'));
    }
}
