<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $categorySlug = null)
    {
        $categorySelected = null;
        $sort = $request->get('sort');

        $categories = ProductCategories::all();
        $productsQuery = Product::query();

        if (!empty($categorySlug)) {
            $category = ProductCategories::where('slug', $categorySlug)->first();
            if ($category) {
                $productsQuery->where('product_category_id', $category->id);
                $categorySelected = $category->id;
            }
        }

        if ($request->get('sort')) {
            if ($request->get('sort') == 'low') {
                $productsQuery->orderBy('new_price', 'ASC');
            } else {
                $productsQuery->orderBy('new_price', 'DESC');
            }
        } else {
            $productsQuery->orderByDesc('id');
        }

        $products = $productsQuery->orderByDesc('id')->paginate(9);
        return view('landing-page.shop', compact('products', 'categories', 'categorySelected', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function product_detail($slug)
    {
        $productDetails = Product::where('slug', $slug)->get();
        return view('landing-page.product-detail', compact('productDetails'));
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
