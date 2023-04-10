<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Search;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminAnalytics extends Component
{
    public function render()
    {
        $searches = Search::select('keyword', DB::raw('COUNT(*) as count'))
        ->groupBy('keyword')
        ->orderBy('count', 'desc')
        ->get();
        $totalProducts = Product::count();
        $totalSales = Order::sum('amount');
        $totalCommission = Wallet::sum('commission');
        $averagePrice = Product::average('price');
        $totalSold = Product::sum('sold');
        $totalUsers = User::where('role_id', 3)->count();
        $totalArtists = User::where('role_id', 2)->count();
        $products = Product::orderBy('sold','desc')->take(20)->get();
        $wallets = Wallet::orderBy('commission','desc')->take(5)->get();

        return view('livewire.admin.admin-analytics', compact('searches','totalProducts','totalSales','totalCommission','averagePrice','totalSold','totalUsers','totalArtists','products','wallets'));
    }
}
