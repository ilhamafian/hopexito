<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Artist;
use App\Models\ProductCollection;
use App\Models\Search;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{

    // views/sellyourart
    public function sellyourart()
    {
        $sellers = User::where('role_id', 2)
            ->whereNotNull('profile_photo_path')
            ->whereHas('artist', function ($query) {
                $query->whereNotNull('cover_image');
            })
            ->withCount('products')
            ->having('products_count', '>', 4)
            ->inRandomOrder()
            ->take(4)
            ->get();
            
        return view('sellyourart', compact('sellers'));
    }
    // views/explore
    public function explore()
    {
        $users = User::where('role_id', 2)
            ->whereNotNull('profile_photo_path')
            ->whereHas('artist', function ($query) {
                $query->whereNotNull('cover_image');
            })
            ->withCount('products')
            ->having('products_count', '>', 4)
            ->inRandomOrder()
            ->take(4)
            ->get();

        $featured = $users->pluck('id');
        $products = Product::where('status', 1)
            ->whereIn('artist_id', $featured)
            ->inRandomOrder()
            ->take(8)
            ->get();

        $collections = ProductCollection::inRandomOrder()
            ->whereHas('product', function ($query) {
                $query->select('collection_id')
                    ->groupBy('collection_id')
                    ->havingRaw('COUNT(*) > 1');
            })
            ->take(2)
            ->get();
        return view('explore', compact('users', 'products', 'collections'));
    }
    // return search results and track search history
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('shopname', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('tags','LIKE', "%{$search}%")
        ->paginate(40);
        
        if (Auth::check()) {
            Search::create([
                'user_id' => Auth::user()->id,
                'keyword' => $search
            ]);
        }
        $search_count = $products->total();

        return view('shop/search', compact('products', 'search', 'search_count'));
    }

    public function collection()
    {
        $productsCollection = ProductCollection::with('product:slug,collection_id,product_image,product_image_2,title,price,shopname')
            ->whereHas('product', function ($query) {
                $query->select('collection_id')
                    ->groupBy('collection_id')
                    ->havingRaw('COUNT(*) > 1');
            })
            ->inRandomOrder()
            ->paginate(5);
        return view('shop/collection', compact('productsCollection'));
    }

    public function shop()
    {
        $products = Product::where('status', '<>', 2)->inrandomOrder()->paginate(64);
        return view('shop/all', compact('products'));
    }
    // return seller profile, views/people
    public function people($shopname)
    {
        $user = User::where('name', $shopname)->first();
        $products = Product::where('artist_id', $user->id)->where('status', '<>', 2)->orderBy('status', 'desc')->get();
        $productsCollection = ProductCollection::where('name', $shopname)->get();

        return view('people', compact('user', 'products', 'productsCollection'));
    }
    // upgrade user from customer to seller
    public function upgrade($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'role_id' => 2
        ]);
        Artist::create([
            'id' => Auth::user()->id
        ]);
        Wallet::create([
            'id' => uniqid(8),
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'commission' => 0,
            'balance' => 0,
            'status' => 1
        ]);

        $user->assignRole('artist');
        session()->flash('message', 'You have been upgraded');
        return redirect()->route('dashboard');
    }
}
