<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artist;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\ProductTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    public function index()
    {
        // 
    }
    // product template selection page
    public function create()
    {
        $template = ProductTemplate::all();
        return view('product.create', compact('template'));
    }
    //  generate product template, views/product/template
    public function template($id)
    {
        $template = ProductTemplate::findOrFail($id);
        $colors = explode(',', $template->color);
        return view('product.template', compact('template', 'colors'));
    }

    // store products into database
    public function store(Request $request)
    {
        $minimum_price = $request->input('min');
        $request->validate([
            'title' => 'required|max:255',
            'tags' => 'required|max:255',
            'price' => 'required|numeric|min:' . $minimum_price,
            'commission' => 'required|numeric',
            'color' => 'required',
        ]);
        $temporaryFile = TemporaryFile::where('filename', $request->image_front)->first();
        if ($temporaryFile) {
            $temporaryFile->delete();
        }
        $temporaryFile_2 = TemporaryFile::where('filename', $request->image_back)->first();
        if ($temporaryFile_2) {
            $temporaryFile_2->delete();
        }
        $input = $request->all();
        // $dataUrl = $input['product_image'];
        // $image = Image::make($dataUrl);
        // $image->encode('jpg', 60);
        // $optimizedImageUrl = 'data:image/jpeg;base64,' . base64_encode($image->__toString());
        // $input['product_image'] = $optimizedImageUrl;
        // $dataUrl2 = $input['product_image_2'];
        // $image2 = Image::make($dataUrl2);
        // $image2->encode('jpg', 60);
        // $optimizedImageUrl2 = 'data:image/jpeg;base64,' . base64_encode($image2->__toString());
        // $input['product_image_2'] = $optimizedImageUrl2;
        $input['preview'] = intval($request->input('preview'));
        $input['color'] = implode(',', $request->input('color'));
        $input['artist_id'] = Auth::user()->id;
        $input['shopname'] = Auth::user()->name;
        $input['slug'] = Str::random(30);
        Product::create($input);
        session()->flash('message', 'Product Created');
        return redirect()->route('product.create');
    }
    // display product page, views/product/show
    public function show(Product $product)
    {
        $user = User::where('name', $product->shopname)->first();
        $products = Product::where('shopname', $product->shopname)->inRandomOrder()->take(8)->get();
        $discover = Product::where('shopname', '!=', $product->shopname)->inRandomOrder()->take(8)->get();
        $totalDesigns = Product::where('shopname', $product->shopname)->count();
        $colors = explode(',', $product->color);
        return view('product.show', compact('product', 'products', 'user', 'colors', 'totalDesigns', 'discover'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
