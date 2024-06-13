<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategories;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategories::all();
        return view('admin.product-categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = DB::table('product_categories')->where('category_name', '=', $request->category_name)->value('category_name');
        if ($data) {
            return view('admin.product-categories.create', [
                'status' => 'duplicate',
                'category_name' => $request->category_name,
                'image_url' => $request->image_url,
                'slug' => $request->slug
            ]);
        } else {
            $data = $request->only([
                'category_name', 'image_url', 'slug'
            ]);
            $data['image_url'] = $request['image_url']->store('ProductCategories/Photos');

        ProductCategories::create($data);
        return redirect()->route('product-categories.index')->with('message', 'The new product category data with the name '. $request->category_name . ' has been sucessfully saved!');
        };
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productCategories = ProductCategories::find($id);
        return view('admin.product-categories.edit', compact('productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ProductCategories::find($id);
        $data->category_name = $request->category_name;
        if($request->file('image_url') != null){
            unlink("storage/".$data->image_url);
            $data->image_url = $request->file('image_url')->store('ProductCategories/Photos');
        }
        $data->slug = $request->slug;
        $data->save();
        return redirect()->route('product-categories.index')->with('message', 'Product category data with the name '. $request->category_name . ' updated sucessfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProductCategories::find($id);
        if($data){
            $delete = $data->delete();
            if($delete)
                unlink("storage/".$data->image_url);
        }
        return back()->with('message', 'Data delete successfully!');
    }
}
