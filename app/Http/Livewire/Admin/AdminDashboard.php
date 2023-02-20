<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\Search;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $search;

    // forcefully delete all artist data in a controlled manner
    public function deleteArtist($id){
        Search::where('user_id', $id)->delete();
        WalletTransaction::where('user_id', $id)->delete();
        Wallet::where('user_id', $id)->delete();
        Artist::where('id', $id)->delete();
        User::where('id', $id)->delete();
        session()->flash('message', 'Artist Deleted');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $artists = User::where('role_id', 2)->where('name','like',$search)->paginate(20);

        return view('livewire.admin.admin-dashboard', compact('artists'));
    }
}
