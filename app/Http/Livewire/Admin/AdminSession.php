<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminSession extends Component
{
    private function payload()
    {
        $sessions = DB::table('sessions')->get();
        foreach ($sessions as $session) {
            $payload = unserialize(base64_decode($session->payload));
            $session->payload = $this->flattenArray($payload);
        }
        return $sessions;
    }
    
    private function flattenArray($array, $prefix = '')
    {
        $flatArray = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $flatArray = array_merge($flatArray, $this->flattenArray($value, $prefix . $key . '.'));
            } else {
                $flatArray[$prefix . $key] = $value;
            }
        }
        return $flatArray;
    }

    public function render()
    {
        $sessions = $this->payload();
        return view('livewire.admin.admin-session', compact('sessions'));
    }
}
