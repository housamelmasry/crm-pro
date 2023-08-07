<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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



    public function create(Request $request)
    {

        $fields = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'city' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['nullable', 'integer', 'min:6', 'max20:'],
            'website' => ['nullable', 'url',],
            'contact_Person' => ['nullable'],
            'contact_Person_Phone' => ['nullable'],
            'company_ID' => ['nullable','int'],

        ]);

        // $fields = Client::create([
            //     'name' => $fields['name'],
            //     'email' => $fields['email'],
            //     'country' => $fields['country'],
            //     'city' => $fields['city'],
            // ]);

            $fields = Client::create($request->all());
        return response(201);

    }











    public function destroy($id)
    {
        Client::destroy($id);
        return Redirect::route('/')->with('success', 'Client deleted!');
    }



}
