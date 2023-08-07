<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }



    public function store(Request $request)
    {
        // Define the validation rules as an array
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'type_of_Business' => ['nullable', 'string', 'max:45'],
            'size' => ['nullable', 'string', 'max:45'],
            'country' => ['nullable', 'string', 'max:45'],
            'city' => ['nullable', 'string', 'max:45'],
            'phone' => ['nullable', 'string', 'max:45'],
            'email' => ['nullable', 'string', 'max:45'],
            'password' => ['nullable', 'string'],
            'website' => ['nullable', 'string'],
            'slogan' => ['nullable', 'string', 'max:256'],
            'theme_color' => ['nullable', 'string', 'max:45'],
            'logo' => ['nullable', 'string'],
            'header_poster' => ['nullable', 'string'],
            'about_us' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'value_icon_benefits' => ['nullable', 'string'],
            'subscription_date' => ['nullable', 'date'],
            'subscription_duration' => ['nullable', 'string'],
            'expiry_date' => ['nullable', 'date'],
            'status' => ['nullable', 'in:active,inactive'],
            'first_login' => ['nullable', 'boolean'],
        ]);

        $company = Company::create($request->all());
        return '201';
    }





    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }






    public function edit(Company $company)
    {
        //
    }




    public function update(Request $request, $id)
    { {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:45',
            'type_of_Business' => 'required|string|max:45',
            'size' => 'required|string|max:45',
            'country' => 'required|string|max:45',
            // Add other fields you want to validate and update here
        ]);

        $company = Company::findOrFail($id);

        $company->name->where('id', '=', $id)->get() ;

        return '';



        // Update the company record with the validated data
        // $company->update($validatedData);

        // Return a success response or any relevant response
        // return response()->json(['message' => 'Company updated successfully']);
      }
    }




    
    public function destroy($id)
    {
        Company::destroy($id);
        return Redirect::route('/')->with('success', 'Company deleted!');
    }
}
