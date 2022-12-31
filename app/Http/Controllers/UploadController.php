<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image_front')) {
            $file = $request->file('image_front');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '-' . Auth::user()->name .'.'. $extension;
            $file->storeAs('public/image-front/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);
            return $filename;
        }

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid(2) . '-' . Auth::user()->name .'.'. $extension;
            $file->storeAs('public/cover-image/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);

            return $filename;
        }
        return '';
    }

    public function callback(Request $request){
        
        $temp = TemporaryFile::where('filename', $request->cover_image)->first();
        
        if($temp){
            $temp->delete();
        }
        Artist::updateOrCreate(['id' => Auth::user()->id], [
            'cover_image' => $request->cover_image ,
            'bio' => $request->bio
        ])->save();

        return redirect()->route('profile.show');
    }
}
