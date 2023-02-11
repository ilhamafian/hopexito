<?php

namespace App\Http\Livewire\Manage;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageOrder extends Component
{

    public function received($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 4]);
        return redirect()->back();
    }
    public function render()
    {
        $order = Order::where('email', Auth::user()->email)->orderBy('created_at', 'DESC')->get();
        return view('livewire.manage.manage-order', compact('order'));
    }
}
