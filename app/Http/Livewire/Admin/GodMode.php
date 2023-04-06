<?php

namespace App\Http\Livewire\Admin;

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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Intervention\Image\Facades\Image;

class GodMode extends Component
{
    public $order_id, $collection_id, $email, $order_name, $description, $delivery, $status, $amount, $tracking_number, $paid, $paid_at, $address, $postcode, $state;
    public $product_order_id, $billplz_id, $product_id, $title, $price, $quantity, $size, $color;
    public $wallet_user_id, $commission, $balance, $transaction_id, $user_id, $wallet_id, $transaction_balance, $income, $new_balance, $transaction_status;
    public $artist_id, $name, $newName;
    public $superadmin_name, $superadmin_email, $super_role, $super_password;
    public $verify_user_id;
    public $unlocked, $unlock_password = '';
    public $bill_id, $new_order_amount;
    public $sold_product;
    public $prod_id, $prod_id_2;
    public $hide = false;

    public function optimizeDataUrl()
    {
        $product = Product::findOrFail($this->prod_id);
        $dataUrl = $product->product_image;
        $dataUrl2 = $product->product_image_2;

        try {
            $image = Image::make($dataUrl);
            $image2 = Image::make($dataUrl2);
            $image->encode('jpg', 90);
            $image2->encode('jpg', 90);
            $optimizedImageUrl = 'data:image/jpeg;base64,' . base64_encode($image->__toString());
            $optimizedImageUrl2 = 'data:image/jpeg;base64,' . base64_encode($image2->__toString());
            $product->product_image = $optimizedImageUrl;
            $product->product_image_2 = $optimizedImageUrl2;
            $product->save();
        } catch (\Exception $e) {
            // Log the exception
            Log::error($e->getMessage());
        }
        session()->flash('message', 'DataUrl Optimized');
        return redirect()->route('godmode');
    }

    public function updateSold()
    {
        $product = Product::findOrFail($this->sold_product);
        $product->update(['sold' => $product->sold + 1]);

        session()->flash('message', 'Plus One Sold');
        return redirect()->route('godmode');
    }
    // change order amount
    public function changeAmount()
    {
        $order = Order::findOrFail($this->bill_id);
        $order->update(['amount' => $this->new_order_amount]);

        session()->flash('message', 'Amount Updated');
        return redirect()->route('godmode');
    }
    // unlock god mode password
    public function unlock()
    {
        $superuser = User::where('role_id', 0)->first();
        if ($superuser && Hash::check($this->unlock_password, $superuser->password)) {
            $this->hide = true;
        } else {
            $this->hide = false;
            session()->flash('message', 'Incorrect Password');
            return redirect()->route('godmode');
        }
    }
    // delete product template
    public function deleteTemplate()
    {
        ProductTemplate::truncate();
        session()->flash('message', 'Product Templates Deleted');
        return redirect()->route('admin.products');
    }
    // verify user
    public function verifyUser()
    {
        $verify_user = User::find($this->verify_user_id);
        $verify_user->update([
            'email_verified_at' => now()
        ]);

        session()->flash('message', 'User Verified');
        return redirect()->route('godmode');
    }
    // create super admin
    public function createSuperadmin()
    {
        User::create([
            'name' => $this->superadmin_name,
            'email' => $this->superadmin_email,
            'role_id' => 0,
            'password' => Hash::make($this->super_password)
        ]);
        session()->flash('message', 'Mastermind Has Come');
        return redirect()->route('godmode');
    }
    // create order
    public function submitOrder()
    {
        Order::create([
            'id' => $this->order_id,
            'collection_id' => $this->collection_id,
            'email' => $this->email,
            'name' => $this->order_name,
            'description' => $this->description,
            'delivery' => $this->delivery,
            'status' => $this->status,
            'amount' => $this->amount,
            'tracking_number' => $this->tracking_number,
            'paid' => $this->paid,
            'paid_at' => $this->paid_at,
            'address' => $this->address,
            'postcode' => $this->postcode,
            'state' => $this->state,
        ]);

        session()->flash('message', 'Order Added');
        return redirect()->route('godmode');
    }
    // create order product
    public function submitProductOrder()
    {
        ProductOrder::create([
            'id' => $this->product_order_id,
            'billplz_id' => $this->billplz_id,
            'product_id' => $this->product_id,
            'title' => $this->title,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'size' => $this->size,
            'color' => $this->color,
        ]);

        session()->flash('message', 'Product Order Added');
        return redirect()->route('godmode');
    }
    // create income transaction
    public function submitTransaction()
    {
        WalletTransaction::create([
            'user_id' => $this->user_id,
            'wallet_id' => $this->wallet_id,
            'balance' => $this->transaction_balance,
            'income' => $this->income,
            'new_balance' => $this->new_balance,
            'status' => $this->transaction_status
        ]);

        session()->flash('message', 'Transaction Added');
        return redirect()->route('godmode');
    }
    // update wallet commission and balance
    public function updateWallet()
    {
        $wallet = Wallet::where('user_id', $this->wallet_user_id);

        if ($wallet) {
            $wallet->update([
                'commission' => $this->commission,
                'balance' => $this->balance
            ]);

            session()->flash('message', 'Wallet Updated');
        } else {
            session()->flash('message', 'Wallet not found');
        }

        return redirect()->route('godmode');
    }
    // delete order on order table
    public function deleteOrder()
    {
        $order = Order::find($this->order_id);
        $product_order = ProductOrder::where('billplz_id', $this->order_id)->get();
        if ($order) {
            $order->delete();
            foreach ($product_order as $item) {
                $item->delete();
            }
        }

        session()->flash('message', 'Order Deleted');
        return redirect()->route('godmode');
    }
    // fix artist name
    public function fixName()
    {
        Product::where('shopname', $this->name)->update(['shopname' => $this->newName]);
        Cart::where('shopname', $this->name)->update(['shopname' => $this->newName]);
        Order::where('name', $this->name)->update(['name' => $this->newName]);
        ProductCollection::where('name', $this->name)->update(['name' => $this->newName]);
        Wallet::where('name', $this->name)->update(['name' => $this->newName]);

        session()->flash('message', 'Name Fixed');
        return redirect()->route('godmode');
    }
    // add wallet to artist
    public function addWallet()
    {
        $user = User::find($this->artist_id);
        if ($user) {
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
        return redirect()->route('godmode');
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

            if (file_exists($cover_image)) {
                unlink($cover_image);
                $file->delete();
            } elseif (file_exists($image_front)) {
                unlink($image_front);
                $file->delete();
            } elseif (file_exists($image_back)) {
                unlink($image_back);
                $file->delete();
            } elseif (file_exists($collection_image)) {
                unlink($collection_image);
                $file->delete();
            } elseif (file_exists($mockup_image)) {
                unlink($mockup_image);
                $file->delete();
            }
        }

        session()->flash('message', 'Cache Cleared');
        return redirect()->route('godmode');
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
        return redirect()->route('godmode');
    }
    // minus RM20 to each wallets
    public function minus20()
    {
        $wallets = Wallet::get();
        foreach ($wallets as $wallet) {
            WalletTransaction::create([
                'user_id' => $wallet->user_id,
                'wallet_id' => $wallet->id,
                'balance' => $wallet->balance,
                'withdrawal' => 20,
                'new_balance' => $wallet->balance - 20,
                'status' => 2
            ]);
            $wallet->update([
                'commission' => $wallet->commission - 20,
                'balance' => $wallet->balance - 20
            ]);
        }
        session()->flash('message', 'Minus RM20 Success');
        return redirect()->route('godmode');
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
        return redirect()->route('godmode');
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
        return redirect()->route('godmode');
    }

    public function render()
    {
        $users = User::where('role_id', 2)->get();
        return view('livewire.admin.god-mode', compact('users'));
    }
}
