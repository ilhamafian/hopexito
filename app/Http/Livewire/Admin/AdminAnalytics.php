<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class AdminAnalytics extends Component
{
    public function render()
    {
        $totalProducts = Product::count();
        $totalSales = Order::sum('amount');
        $totalCommission = Wallet::sum('commission');
        $averagePrice = Product::average('price');
        $totalSold = Product::sum('sold');
        $totalUsers = User::where('role_id', 3)->count();
        $totalArtists = User::where('role_id', 2)->count();
        $products = Product::orderBy('sold','desc')->take(5)->get();
        $wallets = Wallet::orderBy('commission','desc')->take(5)->get();
        return view('livewire.admin.admin-analytics', compact('totalProducts','totalSales','totalCommission','averagePrice','totalSold','totalUsers','totalArtists','products','wallets'));
    }
}
