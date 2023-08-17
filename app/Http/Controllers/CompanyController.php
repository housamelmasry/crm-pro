<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }



    public function store(Request $request)
    {
        // // Define the validation rules as an array
        // $validatedData = $request->Validator([
        //     'name' => ['required', 'string','min:3', 'max:45'],
        //     'type_of_Business' => ['required', 'string','min:3', 'max:45'],
        //     'size' => ['nullable', 'string', 'max:45'],
        //     'country' => ['required', 'string','min:3', 'max:45'],
        //     'city' => ['nullable', 'string', 'max:45'],
        //     'phone' => ['required', 'number','min:7', 'max:20'],
        //     'email' => ['required', 'string','email'],
        //     'password' => ['required', 'string','min:8', 'max:255','confirmed'],
        //     'website' => ['nullable', 'string'],
        //     'slogan' => ['nullable', 'string', 'max:255'],
        //     'theme_color' => ['nullable', 'string','max:45'],
        //     'logo' => ['required', 'string'],
        //     'header_poster' => ['nullable', 'string'],
        //     'about_us' => ['nullable', 'text'],
        //     'mission' => ['nullable', 'text', 'max:3555'],
        //     'vision' => ['nullable', 'text', 'max:3556'],
        //     'value_icon_benefits' => ['nullable', 'string'],
        //     'subscription_date' => ['required', 'date'],
        //     'subscription_duration' => ['nullable', 'dateTime'],
        //     'expiry_date' => ['nullable', 'date'],
        //     'status' => ['nullable', 'in:active,inactive'],
        //     'first_login' => ['nullable', 'boolean'],
        // ]);

        // $company = Company::create([

        //     'name' => $validatedData['name'],
        //     'type_of_Business' => $validatedData['type_of_Business'],
        //     'size' => $validatedData['size'],
        //     'country' => $validatedData['country'],
        //     'city' => $validatedData['city'],
        //     'phone' => $validatedData['phone'],
        //     'email' => $validatedData['email'],
        //     'password' => $validatedData['password'],
        //     'website' => $validatedData['website'],
        //     'slogan' => $validatedData['slogan'],
        //     'theme_color' => $validatedData['theme_color'],
        //     'logo' => $validatedData['logo'],
        //     'header_poster' => $validatedData['header_poster'],
        //     'about_us' => $validatedData['about_us'],
        //     'mission' => $validatedData['mission'],
        //     'vision' => $validatedData['vision'],
        //     'value_icon_benefits' => $validatedData['value_icon_benefits'],
        //     'subscription_date' => $validatedData['subscription_date'],
        //     'subscription_duration' => $validatedData['subscription_duration'],
        //     'expiry_date' => $validatedData['expiry_date'],
        //     'status' => $validatedData['status'],
        //     'first_login' => $validatedData['first_login'],
        // ]);
        Company::create($request->all());
        return response('Company created sucsessfuly', 201);
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
