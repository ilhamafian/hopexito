<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CoverImageBio extends Component
{
    public $cover_image, $bio;

    private function forceFill()
    {
        if (Artist::find(Auth::user()->id)) {
            $artist = Artist::findOrFail(Auth::user()->id);
            $this->cover_image = $artist->cover_image;
            $this->bio = $artist->bio;
        }
    }
    public function render()
    {
        $this->forceFill();
        return view('livewire.cover-image-bio');
    }
}
