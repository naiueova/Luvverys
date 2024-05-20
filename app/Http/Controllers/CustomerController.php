<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'phone',
            'address1',
            'address2',
            'address3'
        ]);

        Customer::create($data);
        return redirect()->route('customer.index')->with('message', 'The new customer data with the name '. $request->name . ' has been sucessfully saved!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::find($id);
        return view('admin.customer.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Customer::find($id);
        $request->validate([
            'name' => 'required|unique:customers,name,' .$id,
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
        ]);

        $data->update($request->all());
        $data->save();
        return redirect()->route('customer.index')->with('message', 'Customer data with the name '. $request->name . ' updated sucessfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Customer::where('id', $id)->delete();
        return back()->with('message', 'Data delete successfully!');
    }
}
