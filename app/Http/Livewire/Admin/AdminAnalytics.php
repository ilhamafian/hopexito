<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
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
        $orders = Order::selectRaw('MONTH(created_at) as month, SUM(amount) as total_amount')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        $totalSold = ProductOrder::sum('quantity');
        $totalSoldPerMonth = ProductOrder::selectRaw('MONTH(created_at) as month, SUM(quantity) as total_quantity')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        $totalProducts = Product::count();
        $totalSales = Order::sum('amount');
        $totalCommission = Wallet::sum('commission');
        $averagePrice = Product::average('price');
        $totalUsers = User::where('role_id', 3)->count();
        $totalArtists = User::where('role_id', 2)->count();
        $products = Product::orderBy('sold', 'desc')->where('sold', '>', 0)->get();
        $wallets = Wallet::orderBy('commission', 'desc')->where('commission', '>', 20)->get();

        return view('livewire.admin.admin-analytics', compact('searches', 'orders', 'totalSold','totalSoldPerMonth','totalProducts', 'totalSales', 'totalCommission', 'averagePrice','totalUsers', 'totalArtists', 'products', 'wallets'));
    }
}
