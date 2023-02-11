<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Livewire\Component;

class AdminMarketing extends Component
{
    // clear storage cache
    public function clearCache()
    {
        $tf = TemporaryFile::get();
        
        foreach ($tf as $file) {
            $cover_image = storage_path("app/public/cover-image/$file->filename");
            $image_front = storage_path("app/public/image-front/$file->filename");
            $collection_image = storage_path("app/public/collection-image/$file->filename");
            if(file_exists($cover_image)){
                unlink($cover_image);
                $file->delete();
            }
            elseif(file_exists($image_front)){
                unlink($image_front);
                $file->delete();
            }
            elseif(file_exists($collection_image)){
                unlink($collection_image);
                $file->delete();
            }
        }

        session()->flash('message', 'Cache Cleared');
        return redirect()->route('admin.marketing');
    }
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
