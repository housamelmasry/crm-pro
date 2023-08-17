<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $fields = $request->validate([
            'first_name' => ['required','string','min:3','max:50'],
            'last_name' => ['nullable','string','min:3','max:50'],
            'phone' => ['nullable','unique','integer','min:8','max:15',],
            'email' => ['required','string','unique:users','email'],
            'password' => ['required','string','confirmed']
        ]);
        $user = User::create([
            'first_name' => $fields['first_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }






    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'email or password is invalid'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }






    public function logout(Request $request)
    {
        auth()->user()->Passport::tokensExpireIn(Carbon::now()->addMinutes(5));;

        return [
            'message' => 'Logged out'
        ];
    }
}
