<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class SocialLinks extends Component
{
    use WithFileUploads;

    public $facebook, $twitter, $instagram, $dribble, $behance, $pinterest, $deviantart, $tiktok, $cover_image;

    public function storeLinks()
    {
        $cover_name = time() . '_' . $this->cover_image->getClientOriginalExtension();
        $this->cover_image->storeAs('cover-image', $cover_name, 'public');

        Artist::updateOrCreate(['id' => Auth::user()->id], [
            'cover_image => $cover_name',
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'dribble' => $this->dribble,
            'behance' => $this->behance,
            'pinterest' => $this->pinterest,
            'deviantart' => $this->deviantart,
            'tiktok' => $this->tiktok,
        ])->save();

        session()->flash('message', 'Saved.');
    }

    private function forceFill()
    {
        if (Artist::find(Auth::user()->id)) {
            $artist = Artist::findOrFail(Auth::user()->id);
            $this->cover_image = $artist->cover_image;
            $this->facebook = $artist->facebook;
            $this->twitter = $artist->twitter;
            $this->instagram = $artist->instagram;
            $this->dribble = $artist->dribble;
            $this->behance = $artist->behance;
            $this->pinterest = $artist->pinterest;
            $this->deviantart = $artist->deviantart;
            $this->tiktok = $artist->tiktok;
        }
    }

    public function render()
    {
        $this->forceFill();
        return view('livewire.social-links');
    }
}
