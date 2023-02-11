<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function deleteArtist($id){
        // WalletTransaction::where('id', $id)->delete();
        Wallet::where('id', $id)->delete();
        Artist::where('id', $id)->delete();
        User::where('id', $id)->delete();
        session()->flash('message', 'User Deleted');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $artists = User::where('role_id', 2)->get();

        return view('livewire.admin.admin-dashboard', compact('artists'));
    }
}
