<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{

    public function index(){

        $orders = Order::all();
        return response()->json($orders);
    }


    public function show($id)
    {
        $orders = Order::findOrFail($id);
        return response()->json($orders);
    }






    public function create(Request $request)
    {
        Order::create($request->all());

    }
















    public function destroy($id)
    {
        Order::destroy($id);
        return Redirect::route('/')->with('success', 'Order deleted!');
    }
}
