<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request()->validate([
           'username' => 'required',
           'password' => 'required'
        ]); 
        
        if (Auth::attempt($credentials)) {

           request()->session()->regenerate();

           return response()->json([
              'id' => auth()->user()->id,
              'name' => auth()->user()->name,
              'username' => auth()->user()->username,
              'token' => auth()->user()->createToken('authToken')->plainTextToken
           ]);
        }
        
        throw ValidationException::withMessages([
           'username' => 'Invalid credentials'
         ]);
    }

    public function logout()
     {
        if (auth()->check()) {
           request()->session()->invalidate();
           request()->session()->regenerateToken();
           Auth::logout();
        }
        
        return response()->noContent();
     }
}
