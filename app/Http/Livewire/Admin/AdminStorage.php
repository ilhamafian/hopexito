<?php

namespace App\Http\Livewire\Admin;

use App\Models\Artist;
use App\Models\Product;
use App\Models\ProductCollection;
use App\Models\ProductTemplate;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    private function diskPathSize($path)
    {
        $diskSize = array_reduce(glob(storage_path("app/public/{$path}/*")), function ($accumulator, $file) {
            return $accumulator + filesize($file);
        }, 0);

        return $this->formatBytes($diskSize);
    }

    private function diskSize()
    {
        $diskSize = collect(Storage::disk('public')->allFiles())->map(function ($path) {
            return Storage::disk('public')->size($path);
        })->sum();

        return $this->formatBytes($diskSize);
    }

    private function getFiles($directory)
    {
        $files = Storage::files($directory);
        return array_map('basename', $files);
    }

    public function unlink($file)
    {
        $cover_image = storage_path("app/public/cover-image/$file");
        $image_back = storage_path("app/public/image-back/$file");
        $image_front = storage_path("app/public/image-front/$file");
        $mockup_image = storage_path("app/public/mockup-image/$file");
        $collection_image = storage_path("app/public/collection-image/$file");
        $profile_photo = storage_path("app/public/profile-photos/$file");

        if (file_exists($cover_image)) {
            unlink($cover_image);
        }
        if (file_exists($image_back)) {
            unlink($image_back);
        }
        if (file_exists($image_front)) {
            unlink($image_front);
        }
        if (file_exists($mockup_image)) {
            unlink($mockup_image);
        }
        if (file_exists($collection_image)) {
            unlink($collection_image);
        }
        if (file_exists($profile_photo)) {
            unlink($profile_photo);
        }
    }

    public function render()
    {
        $DBSize = DB::table('information_schema.TABLES')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->selectRaw('sum(round(((data_length + index_length) / 1024 / 1024), 2)) as size')
            ->get();
        $productDBSize = DB::table('information_schema.TABLES')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->where('table_name', 'products')
            ->selectRaw('sum(round(((data_length + index_length) / 1024 / 1024), 2)) as size')
            ->get();
        $diskSize = $this->diskSize();
        $diskCollectionSize = $this->diskPathSize('collection-image');
        $diskCoverSize = $this->diskPathSize('cover-image');
        $diskImageBackSize = $this->diskPathSize('image-back');
        $diskImageFrontSize = $this->diskPathSize('image-front');
        $diskProfilePhotoSize = $this->diskPathSize('profile-photos');

        $collection_image_path = ProductCollection::pluck('collection_image');
        $cover_image_path = Artist::whereNotNull('cover_image')->pluck('cover_image');
        $image_back_path = Product::whereNotNull('image_back')->pluck('image_back');
        $image_front_path = Product::whereNotNull('image_front')->pluck('image_front');
        $mockup_image_path = ProductTemplate::whereNotNull('mockup_image')->pluck('mockup_image');
        $mockup_image_2_path = ProductTemplate::whereNotNull('mockup_image_2')->pluck('mockup_image_2');
        $profile_photos_path = User::whereNotNull('profile_photo_path')->pluck('profile_photo_path');

        $temp = TemporaryFile::get();

        $collection_image_files = $this->getFiles('public/collection-image');
        $cover_image_files = $this->getFiles('public/cover-image');
        $image_back_files = $this->getFiles('public/image-back');
        $image_front_files = $this->getFiles('public/image-front');
        $mockup_image_files = $this->getFiles('public/mockup-image');
        $profile_photos_files = $this->getFiles('public/profile-photos');

        return view('livewire.admin.admin-storage', compact('DBSize', 'productDBSize', 'diskSize', 'diskCollectionSize', 'diskCoverSize', 'diskImageBackSize', 'diskImageFrontSize', 'diskProfilePhotoSize', 'collection_image_path', 'cover_image_path', 'image_back_path', 'image_front_path', 'mockup_image_path', 'mockup_image_2_path', 'profile_photos_path', 'temp', 'collection_image_files', 'cover_image_files', 'image_back_files', 'image_front_files', 'mockup_image_files', 'profile_photos_files'));
    }
}
