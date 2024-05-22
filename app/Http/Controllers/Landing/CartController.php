<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        // dd($id);
        Cart::add($id, $product->product_name, 1, $product->new_price,
            ['image' => $product->image1_url]
        );
        // dd(Cart::content());
        $message = '<strong>' . $product->product_name . '<strong> added to cart successfully.';
        session()->flash('success', $message);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cart()
    {
        // dd($cartContent);
        return view('landing-page.cart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
