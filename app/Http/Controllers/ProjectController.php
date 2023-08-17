<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }



    public function show($id)
    {
        $projects = Project::findOrFail($id);
        return response()->json($projects);
    }



    public function create(Request $request)
    {
        Project::create($request->all());
        return response('Project created sucsessfuly', 201);

    }













    public function destroy($id)
    {
        Project::destroy($id);
        return Redirect::route('/')->with('success', 'Project deleted!');
    }
}
