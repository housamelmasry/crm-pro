<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use GuzzleHttp\Psr7\Message;
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

        //     'name' => ['string','required','min:3','max:255',],
        //     'available_qty' => ['nullable','integer',],
        //     'price' => ['required','decimal:10,2',],
        //     'brand' => ['nullable','string',],



        // ]);



        $validator = validator($request->all(),[

            'name' => ['string','required','min:3','max:255',],
            'available_qty' => ['nullable','integer',],
            'price' => ['required','decimal:10,2',],
            'brand' => ['nullable','string',],

        ]);
        // if ($validator-> fails()){
        //     return response('error creating', 400);
        // }
            // return response(201);

        Product::create($request->all());

        return response('Product created sucsessfuly', 201);

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
