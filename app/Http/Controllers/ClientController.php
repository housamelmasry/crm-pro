<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }



    public function show($id)
    {
        $clients = Client::findOrFail($id);
        return response()->json($clients);
    }



    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'city' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['nullable', 'integer', 'min:6', 'max20:'],
            'website' => ['nullable', 'url',],
            'contact_Person' => ['nullable'],
            'contact_Person_Phone' => ['nullable'],
            'added_by' => ['nullable','int'],
        ]);


        if($validator->fails())
        {
            return response ()->json([
                'fail'=> false,
                'message'=> 'Sorry not stored',
                'error'=> $validator->errors(),
            ]);
        }

        $client = Client::create($input);

        return response ()->json([
            'success'=> true,
            'message'=> 'client was successfully stored',
            'client'=> $client,

        ]);






        // $fields = Client::create([
            //     'name' => $fields['name'],
            //     'email' => $fields['email'],
            //     'country' => $fields['country'],
            //     'city' => $fields['city'],
            // ]);

            // Client::create($request->all());
            // return response('Client created sucsessfuly', 201);

    }











    public function destroy($id)
    {
        Client::destroy($id);
        return Redirect::route('/')->with('success', 'Client deleted!');
    }



}
