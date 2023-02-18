<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $search;

    public function deleteArtist($id){
        Wallet::where('user_id', $id)->delete();
        Artist::where('id', $id)->delete();
        User::where('id', $id)->delete();
        session()->flash('message', 'User Deleted');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $artists = User::where('role_id', 2)->where('name','like',$search)->paginate(20);

        return view('livewire.admin.admin-dashboard', compact('artists'));
    }
}
