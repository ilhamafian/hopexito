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

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
    private function diskSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles())->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }
    private function diskCollectionSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles('collection-image'))->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }
    private function diskCoverSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles('cover-image'))->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }
    private function diskImageBackSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles('image-back'))->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }
    private function diskImageFrontSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles('image-front'))->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }
    private function diskProfilePhotoSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles('profile-photos'))->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }

    private function getFiles($directory)
    {
        $files = Storage::files($directory);
        return array_map('basename', $files);
    }

    public function unlink($file){

        $cover_image = storage_path("app/public/cover-image/$file");
        $image_back = storage_path("app/public/image-back/$file");
        $image_front = storage_path("app/public/image-front/$file");
        $mockup_image = storage_path("app/public/mockup-image/$file");
        $collection_image = storage_path("app/public/collection-image/$file");
        $profile_photo = storage_path("app/public/profile-photos/$file");

        if(file_exists($cover_image)){
            unlink($cover_image);
        }
        if(file_exists($image_back)){
            unlink($image_back);
        }
        if(file_exists($image_front)){
            unlink($image_front);
        }
        if(file_exists($mockup_image)){
            unlink($mockup_image);
        }
        if(file_exists($collection_image)){
            unlink($collection_image);
        }
        if(file_exists($profile_photo)){
            unlink($profile_photo);
        }
    }

    public function render()
    {
        $diskSize = $this->diskSize();
        $diskCollectionSize = $this->diskCollectionSize();
        $diskCoverSize = $this->diskCoverSize();
        $diskImageBackSize = $this->diskImageBackSize();
        $diskImageFrontSize = $this->diskImageFrontSize();
        $diskProfilePhotoSize = $this->diskProfilePhotoSize();
        $collection_image_path = ProductCollection::pluck('collection_image');
        $cover_image_path = Artist::whereNotNull('cover_image')->pluck('cover_image');
        $image_back_path = Product::whereNotNull('image_back')->pluck('image_back');
        $image_front_path = Product::whereNotNull('image_front')->pluck('image_front');
        $mockup_image_path = ProductTemplate::whereNotNull('mockup_image')->pluck('mockup_image');
        $profile_photos_path = User::whereNotNull('profile_photo_path')->pluck('profile_photo_path');
        $temp = TemporaryFile::get();
        $collection_image_files = $this->getFiles('public/collection-image');
        $cover_image_files = $this->getFiles('public/cover-image');
        $image_back_files = $this->getFiles('public/image-back');
        $image_front_files = $this->getFiles('public/image-front');
        $mockup_image_files = $this->getFiles('public/mockup-image');
        $profile_photos_files = $this->getFiles('public/profile-photos');

        return view('livewire.admin.admin-storage', compact('diskSize','diskCollectionSize','diskCoverSize','diskImageBackSize','diskImageFrontSize','diskProfilePhotoSize','collection_image_path', 'cover_image_path', 'image_back_path', 'image_front_path', 'mockup_image_path', 'profile_photos_path', 'temp', 'collection_image_files', 'cover_image_files', 'image_back_files', 'image_front_files', 'mockup_image_files', 'profile_photos_files'));
    }
}
