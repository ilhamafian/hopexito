<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\CustomProduct;
use App\Models\ProductCollection;
use App\Models\ProductTemplate;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // request from views/mockup
        if ($request->hasFile('image_front')) {
            $file = $request->file('image_front');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('181') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/image-front/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);
            return $filename;
        }
        if ($request->hasFile('image_back')) {
            $file = $request->file('image_back');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('181') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/image-back/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);
            return $filename;
        }
        //  request from views/custom/
        // if ($request->hasFile('custom_image_front')) {
        //     $file = $request->file('custom_image_front');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = uniqid('120') . '-' . Auth::user()->name . '.' . $extension;
        //     $file->storeAs('public/custom-image-front/', $filename);

        //     TemporaryFile::create([
        //         'filename' => $filename
        //     ]);
        //     return $filename;
        // }
        // if ($request->hasFile('custom_image_back')) {
        //     $file = $request->file('custom_image_back');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = uniqid('120') . '-' . Auth::user()->name . '.' . $extension;
        //     $file->storeAs('public/custom-image-back/', $filename);

        //     TemporaryFile::create([
        //         'filename' => $filename
        //     ]);
        //     return $filename;
        // }
        // request from views/
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('1d1') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/cover-image/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);

            return $filename;
        }
        // request from views/livewire/admin/template
        if ($request->hasFile('mockup_image')) {
            $file = $request->file('mockup_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('12b') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/mockup-image/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);

            return $filename;
        }
        // request from views/livewire/admin/template
        if ($request->hasFile('mockup_image_2')) {
            $file = $request->file('mockup_image_2');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('12b') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/mockup-image/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);

            return $filename;
        }
        // request from views/livewire/admin/product
        if ($request->hasFile('collection_image')) {
            $file = $request->file('collection_image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('7a9') . '-' . Auth::user()->name . '.' . $extension;
            $file->storeAs('public/collection-image/', $filename);

            TemporaryFile::create([
                'filename' => $filename
            ]);

            return $filename;
        }
    }
    // upload cover image
    public function uploadCover(Request $request)
    {
        $request->validate([
            'cover_image' => 'required|string',
            'bio' => 'string|max:750',
        ]);

        $temp = TemporaryFile::where('filename', $request->cover_image)->first();
        if ($temp) {
            $temp->delete();
        }

        Artist::updateOrCreate(['id' => Auth::user()->id], [
            'cover_image' => $request->cover_image,
        ])->save();

        session()->flash('message', 'Profile Updated');
        return redirect()->route('profile.show');
    }
    // upload product template image
    public function uploadTemplate(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'mockup_image' => 'required|string',
            'mockup_image_2' => 'required|string',
            'commission' => 'required|numeric',
            'min' => 'required|numeric',
            'color' => 'required'
        ]);

        $temp = TemporaryFile::where('filename', $request->mockup_image)->first();
        if ($temp) {
            $temp->delete();
        }
        $temp_2 = TemporaryFile::where('filename', $request->mockup_image_2)->first();
        if ($temp_2) {
            $temp_2->delete();
        }

        ProductTemplate::create([
            'category' => $request->category,
            'mockup_image' => $request->mockup_image,
            'mockup_image_2' => $request->mockup_image_2,
            'commission' => $request->commission,
            'status' => 1,
            'min' => $request->min,
            'color' => implode(',', $request->input('color'))
        ]);

        session()->flash('message', 'Product Template Created');
        return redirect()->route('admin.templates');
    }
    // upload collection image
    public function uploadCollection(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'collection_image' => 'required|string',
        ]);

        $temp = TemporaryFile::where('filename', $request->collection_image)->first();
        if ($temp) {
            $temp->delete();
        }

        ProductCollection::create([
            'id' => uniqid(),
            'name' => Auth::user()->name,
            'title' => $request->title,
            'collection_image' => $request->collection_image
        ]);

        session()->flash('message', 'New Collection Added');
        return redirect()->route('product.manage');
    }

    public function uploadCustom(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'color' => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->custom_image_front)->first();
        if ($temporaryFile) {
            $temporaryFile->delete();
        }
        $temporaryFile_2 = TemporaryFile::where('filename', $request->custom_image_back)->first();
        if ($temporaryFile_2) {
            $temporaryFile_2->delete();
        }
        $input = $request->all();
        $dataUrl = $input['custom_product_image'];
        $image = Image::make($dataUrl);
        $image->encode('png');
        $filename = uniqid() . '-' . Auth::user()->name . '.png';
        Storage::disk('public')->put('custom-product-front/' . $filename, $image->stream());
        $input['custom_product_image'] = $filename;
        $dataUrl2 = $input['custom_product_image_2'];
        $image2 = Image::make($dataUrl2);
        $image2->encode('png');
        $filename2 = uniqid() . '-' . Auth::user()->name . '.png';
        Storage::disk('public')->put('custom-product-back/' . $filename2, $image2->stream());
        $input['custom_product_image_2'] = $filename2;
        $input['user_id'] = Auth::user()->id;
        $input['price'] = 35;
        $product = CustomProduct::create($input);
        if($product){
            $id = $product->id;
        }
        dd($product);
        return redirect()->route('');
    }
}
