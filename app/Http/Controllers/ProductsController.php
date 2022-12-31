<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $artist = Artist::find(Auth::user()->id);
        $products = Product::where('shopname', '=', Auth::user()->name)->get();
        return view('product.index', compact('products','artist'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $temporaryFile = TemporaryFile::where('filename', $request->image_front)->first();
        if($temporaryFile){
            $temporaryFile->delete();
        }
        $input = $request->all();
        $input['shopname'] = Auth::user()->name;
        $product = Product::create($input); 
        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    { 
        $user = User::where('name',$product->shopname)->first();
        $products = Product::where('shopname', '=', $product->shopname)->get();
        return view('product.show', compact('product','products','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
