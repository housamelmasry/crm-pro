<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $fields = $request->validate([
        //     'name' => 'required|string|min:3',
        //     'price' => 'required',
        //     'password' => 'required|string|confirmed'
        // ]);

        // Product::create([
        //     'name' => $request('name'),
        //     'category_id' => $request('category_id'),
        //     'available_qty' => $request('available_qty'),
        //     'price' => $request('price'),
        //     'cost' => $request('cost'),
        //     'brand' => $request('brand'),
        //     'status' => $request('status'),
        //     'added_by' => $request('added_by'),
        //     'company_id' => $request('company_id'),


        // ]);

        Product::create($request->all());

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
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return response()->json($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return Redirect::route('/')->with('success', 'Product deleted!');
    }
}
