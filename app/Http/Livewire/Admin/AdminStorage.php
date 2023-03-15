<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductTemplate;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminStorage extends Component
{

    private function formatBytes($bytes, $precision = 2){
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function render()
    {
        $diskSize = collect(Storage::disk('public')->allFiles())->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();
        $formattedDisk = $this->formatBytes($diskSize);

        $collection_image_path = ProductCollection::pluck('collection_image');
        $cover_image_path = Artist::whereNotNull('cover_image')->pluck('cover_image');
        $image_back_path = Product::whereNotNull('image_back')->pluck('image_back');
        $image_front_path = Product::whereNotNull('image_front')->pluck('image_front');
        $mockup_image_path = ProductTemplate::whereNotNull('mockup_image')->pluck('mockup_image');
        $profile_photos_path = User::whereNotNull('profile_photo_path')->pluck('profile_photo_path');
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

        return view('livewire.admin.admin-storage', compact('formattedDisk','collection_image_path', 'cover_image_path', 'image_back_path', 'image_front_path', 'mockup_image_path', 'profile_photos_path', 'temp', 'collection_image_files', 'cover_image_files', 'image_back_files', 'image_front_files', 'mockup_image_files', 'profile_photos_files'));
    }
}
