<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminSession extends Component
{
    public function render()
    {
        $sessions = DB::table('sessions')->get();
        return view('livewire.admin.admin-session', compact('sessions'));
    }
}
