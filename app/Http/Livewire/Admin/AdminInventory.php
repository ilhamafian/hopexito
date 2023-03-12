<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory;
use Livewire\Component;

class AdminInventory extends Component
{
    public $wxs, $ws, $wm, $wl, $wxl, $w2xl;
    public $color, $size;

    public function createInventory(){
        $colors = ['White', 'Black','Sand','Gray']; // array of colors
        $sizes = ['XS', 'S', 'M', 'L', 'XL', '2XL']; // array of sizes
        $categories = ['Shirt', 'Oversized Tee','Hoodie','Sweater'];

        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                foreach($categories as $category)
    
                Inventory::create([
                    'color' => $color,
                    'size' => $size,
                    'amount' => 0,
                    'category' => $category
                ]);
            }
        }

        session()->flash('message','Inventory Created');
        return redirect()->route('admin.inventory');
    }

    public function increaseInventory($id){
        $inventory = Inventory::find($id);
        $inventory->update([
            'amount' => $inventory->amount + 1 
        ]);
    }

    public function decreaseInventory($id){
        $inventory = Inventory::find($id);
        $inventory->update([
            'amount' => $inventory->amount - 1 
        ]);
    }

    public function deleteInventory(){
        Inventory::truncate();
        session()->flash('message','Inventory Deleted');
        return redirect()->route('admin.inventory');
    }

    private function forceFill(){

    }

    public function render()
    {
        $inventories = Inventory::get();
        return view('livewire.admin.admin-inventory', compact('inventories'));
    }
}
