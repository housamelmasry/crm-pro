<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        // $fields = $request->validate([
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'min:3', 'max:50'],
            'last_name' => ['nullable', 'string', 'min:3', 'max:50'],
            'phone' => ['nullable', 'integer', 'min:8', 'max:15',],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed']
        ]);


        if ($validator->fails()) {

            return response()->json([
                'fail' => false,
                'message' => 'Sorry not stored',
                'error' => $validator->errors(),
            ]);
        }

        $user = User::create($input);

        $token = $user->createToken('token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json([
            'success' => true,
            'message' => 'client was successfully stored',
            'client' => $response,

        ]);
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
        if (!$user || !Hash::check($fields['password'], $user->password)) {
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
