<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $artists = User::where('role_id', 2)->get();
        $products = Product::all();

        return view('livewire.admin.admin-dashboard', compact('artists', 'products'));
    }
}
