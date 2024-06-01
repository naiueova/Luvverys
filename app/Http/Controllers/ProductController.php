<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategories;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => DB::table('vwproduct')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            'product_categories' => ProductCategories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = DB::table('products')->where('product_name', '=', $request->product_name)->value('product_name');
        if ($data) {
            return view('admin.product.create', [
                'status' => 'duplicate',
                'product_categories' => ProductCategories::all(),
                'product_name' => $request->product_name,
                'description' => $request->description,
                'price' => $request->price,
                'stok_quantity' => $request->stok_quantity,
                'image1_url' => $request->image1_url,
                'image2_url' => $request->image2_url,
                'image3_url' => $request->image3_url,
                'image4_url' => $request->image4_url,
                'image5_url' => $request->image5_url,
                'slug' => $request->slug
            ]);
        } else {
            $data = $request->only([
                'product_category_id', 'product_name', 'description', 'price', 'stok_quantity', 'image1_url', 'image2_url', 'image3_url', 'image4_url', 'image5_url', 'slug'
            ]);
            $data['image1_url'] = $request['image1_url']->store('Products/Photos');
            $data['image2_url'] = $request['image2_url']->store('Products/Photos');
            $data['image3_url'] = $request['image3_url']->store('Products/Photos');
            $data['image4_url'] = $request['image4_url']->store('Products/Photos');
            $data['image5_url'] = $request['image5_url']->store('Products/Photos');
            $save = Product::create($data);
            return redirect()->route('product.index')->with('message', 'The new product data with the name '. $request->product_name .' has been sucessfully saved!');

    };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::find($id);
        return view('admin.product.edit', [
            'product_categories' => ProductCategories::all(),
            'product'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);

        $data->product_category_id = $request->product_category_id;
        $data->product_name = $request->product_name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->stok_quantity = $request->stok_quantity;
        if($request->file('image1_url') != null){
            unlink("storage/".$data->image1_url);
            $data->image1_url = $request->file('image1_url')->store('Products/Photos');
        }
        if($request->file('image2_url') != null){
            unlink("storage/".$data->image2_url);
            $data->image2_url = $request->file('image2_url')->store('Products/Photos');
        }
        if($request->file('image3_url') != null){
            unlink("storage/".$data->image3_url);
            $data->image3_url = $request->file('image3_url')->store('Products/Photos');
        }
        if($request->file('image4_url') != null){
            unlink("storage/".$data->image4_url);
            $data->image4_url = $request->file('image4_url')->store('Products/Photos');
        }
        if($request->file('image5_url') != null){
            unlink("storage/".$data->image5_url);
            $data->image5_url = $request->file('image5_url')->store('Products/Photos');
        }
        $data->slug = $request->slug;

        $data->save();
        return redirect()->route('product.index')->with('message', 'Product '. $request->product_name .' updated sucessfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        if($data){
            $delete = $data->delete();
            if($delete)
            unlink("storage/".$data->image1_url);
            if($delete)
            unlink("storage/".$data->image2_url);
            if($delete)
            unlink("storage/".$data->image3_url);
            if($delete)
            unlink("storage/".$data->image4_url);
            if($delete)
            unlink("storage/".$data->image5_url);
        }
        return back()->with('message', 'Data delete successfully!');
    }
}
