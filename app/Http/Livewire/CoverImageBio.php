<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CoverImageBio extends Component
{
    public $cover_image, $bio;

    public function updateBio(){
        $artist = Artist::find(Auth::user()->id);
        $artist->update([
            'bio' => $this->bio
        ]);

        session()->flash('message','Bio Updated');
        return redirect()->route('profile.show');
    }

    private function forceFill()
    {
        if (Artist::find(Auth::user()->id)) {
            $artist = Artist::findOrFail(Auth::user()->id);
            if($artist->cover_image){
                $this->cover_image = $artist->cover_image;
            }
            if($artist->bio){
                $this->bio = $artist->bio;
            }
        }
    }
    public function render()
    {
        $this->forceFill();
        return view('livewire.cover-image-bio');
    }
}
