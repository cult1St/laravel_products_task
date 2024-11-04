<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    //
    public function getAllUsers(){
        $user = User::all();
        return response()->json(["success" => true, "message" => "All Users Fetched Succcessfully", "data" => $user], 200);
    }


    public function createUser(Request $request){
        try{
            $request->validate([
            "name" => "required|string",
            "email" => "required|email|string",
            'password' => "required|string|min:6"
        ]);
        }catch (ValidationException $e) {
            // Return validation error messages
            return response()->json([
                'success' => false,
                'errors' => $e->validator->errors(),
            ], 422); // Unprocessable Entity status code
        }


        $user = User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        return response()->json(["success" => true, "message" => "All Users Fetched Succcessfully", "data" => $user], 200);
    }
}
