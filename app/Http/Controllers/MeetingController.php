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

        // $fields = $request->validate([
        //     'reference' => ['nullable','string'],
        //     'type' => ['nullable','string'],
        //     'notes' => ['nullable','text','max:3554'],
        //     'company_ID' => ['nullable','integer']
        // ]);

        $validator = validator($request->all(),[

            'reference' => ['nullable','string'],
            'type' => ['nullable','string'],
            'notes' => ['nullable','text','max:3554'],
            'company_ID' => ['nullable','integer'],
        ]);



        Meeting::create($request->all());
        return response('Meeting created sucsessfuly', 201);

    }

















    public function destroy($id)
    {
        Meeting::destroy($id);
        return Redirect::route('/')->with('success', 'Meeting deleted!');
    }
}
