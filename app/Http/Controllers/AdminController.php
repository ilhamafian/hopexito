<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $artists = User::where('role_id', '=', 2)->get();
        $products = Product::all();
        
        return view('admin.dashboard',compact('artists','products'));
    }
    public function analytics(){
        return view('admin.analytics');
    }
    public function orders(){
        return view('admin.orders');
    }
}
