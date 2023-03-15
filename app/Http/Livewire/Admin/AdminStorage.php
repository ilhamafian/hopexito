<?php

namespace App\Http\Livewire\Admin;

use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminStorage extends Component
{
    public function render()
    {   
        $temp = TemporaryFile::get();
        $collection_image = Storage::files('public/collection-image');
        $collection_image_files = array_map('basename', $collection_image);
        $cover_image = Storage::files('public/cover-image');
        $cover_image_files = array_map('basename', $cover_image);
        $image_back = Storage::files('public/image-back');
        $image_back_files = array_map('basename', $image_back);
        $image_front = Storage::files('public/image-front');
        $image_front_files = array_map('basename', $image_front);
        $mockup_image = Storage::files('public/mockup-image');
        $mockup_image_files = array_map('basename', $mockup_image);
        $profile_photos = Storage::files('public/profile-photos');
        $profile_photos_files = array_map('basename', $profile_photos);

        return view('livewire.admin.admin-storage', compact('temp','collection_image_files','cover_image_files','image_back_files','image_front_files','mockup_image_files','profile_photos_files'));
    }
}
