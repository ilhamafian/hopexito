<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as SessionCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function create()
    {
        //
    }

    // store cart into database
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'color' => 'required',
        ]);
        
        $product = Product::findOrFail($request->input('product_id'));
        $cart = SessionCart::instance('cart')->add(['id' => $product->id, 'name' => $product->title, 'qty' => $request->input('quantity'), 'price' => $product->price, 'weight' => 500 * $request->input('quantity'), 'options' => ['size' => $request->input('size'), 'image' => $product->front_shirt, 'color' => $request->input('color'), 'shopname' => $product->shopname]]);
        $rowId = $cart->rowId;
        $rowId = uniqid(10);
        if (Auth::check()) {
            Cart::create([
                'id' => $rowId,
                'product_id' => $cart->id,
                'email' => Auth::user()->email,
                'shopname' => $cart->options['shopname'],
                'title' => $cart->name,
                'quantity' => $cart->qty,
                'price' => $cart->price,
                'subtotal' => $cart->price * $cart->qty,
                'weight' => $cart->weight,
                'size' => $cart->options['size'],
                'color' => $cart->options['color'],
                'product_image' => $cart->options['image']
            ]);
        }
        session()->flash('message','Successfully added to cart');
        return redirect()->route('product.show', $product->slug);
    }

    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Cart $cart, $rowId)
    {
        // 
    }

    public function destroy( $rowId)
    {
        // 
    }
}
