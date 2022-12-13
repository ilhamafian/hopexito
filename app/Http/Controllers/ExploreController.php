<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ExploreController extends Controller
{
    public function explore(){
        $products = Product::all();
        $artists = User::where('role_id', '=', 2)->get();
        return view('explore', compact('products','artists'));
    }
}
