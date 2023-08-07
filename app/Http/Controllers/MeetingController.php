<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return response()->json($meetings);
    }



    public function show($id)
    {
        $meetings = Meeting::findOrFail($id);
        return response()->json($meetings);
    }




    public function create(Request $request)
    {
        Meeting::create($request->all());

    }

















    public function destroy($id)
    {
        Meeting::destroy($id);
        return Redirect::route('/')->with('success', 'Meeting deleted!');
    }
}
