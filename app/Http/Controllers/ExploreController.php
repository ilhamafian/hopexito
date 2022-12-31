<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function explore()
    {
        $products = Product::all();
        $artists = User::where('role_id', '=', 2)->get();
        return view('explore', compact('products', 'artists'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('shopname', 'LIKE', "%{$search}%")
            ->get();

        return view('explore', compact('products'))->with('success', 'Search results for.');
    }

    public function people($shopname)
    {   
        $user = User::where('name',$shopname)->first();
        $artist = Artist::where('id', $user->id)->first();
        $products = Product::where('shopname',$shopname)->get();
        
        return view('people',compact('products','user','artist'));
    }
}
