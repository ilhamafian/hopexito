<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use Livewire\WithPagination;

class AdminOrder extends Component
{
    use WithPagination;

    public $tracking_number;
 
    // update order status as processing
    public function processing($id){
        $order = Order::findOrFail($id);
        $order->update(['status' => 2]);
        
        return redirect()->back();
    }

    // update order status as shipped
    public function shipped($id){
        $tracking_number = $this->tracking_number;
        $order = Order::findOrFail($id);
        $order->update(['status' => 3, 'tracking_number' => $tracking_number]);
        
        return redirect()->route('admin.orders')->with('success', $id .' status updated.');
    }

    // update order status as delivered
    public function delivered($id){
        $order = Order::findOrFail($id);
        $order->update(['status' => 4]);
        
        return redirect()->back();
    }

    // export product image
    public function exportFront($id){
        $product = Product::findOrFail($id);
        $imageFileName = $product->image_front;
        $imageFilePath = 'app/public/image-front/' . $imageFileName;

        return response()->download(storage_path($imageFilePath));
    }

    public function exportBack($id){
        $product = Product::findOrFail($id);
        $imageFileName = $product->image_back;
        $imageFilePath = 'app/public/image-back/' . $imageFileName;

        return response()->download(storage_path($imageFilePath));
    }

    public function render()
    {
        $orders = Order::orderBy('paid_at','DESC')->get();
        // $orders = Order::paginate(5);
        $totalOrder = Order::count();
        $totalAmount = Order::sum('amount');
        $totalDelivery = Order::sum('delivery');
        $totalOrderPlaced = Order::where('status', 1)->count('status');
        $totalOrderProcessing = Order::where('status', 2)->count('status');
        $totalOrderShipped = Order::where('status', 3)->count('status');
        $totalOrderDelivered = Order::where('status', 4)->count('status');

        return view('livewire.admin.admin-order', compact('orders','totalOrder','totalAmount','totalDelivery','totalOrderPlaced','totalOrderProcessing','totalOrderShipped','totalOrderDelivered'));
    }
}
