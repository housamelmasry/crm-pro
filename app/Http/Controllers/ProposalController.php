<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProposalController extends Controller
{

    public function index()
    {
        $proposals = Proposal::all();
        return response()->json($proposals);
    }



    public function show($id)
    {
        $proposals = Proposal::findOrFail($id);
        return response()->json($proposals);
    }



    public function create(Request $request)
    {
        Proposal::create($request->all());
        return response('Proposal created sucsessfuly', 201);

    }












    public function destroy($id)
    {
        Proposal::destroy($id);
        return Redirect::route('/')->with('success', 'Proposal deleted!');
    }
}
