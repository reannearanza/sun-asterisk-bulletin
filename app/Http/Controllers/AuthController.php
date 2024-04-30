<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   /**
    * login
    *
    * @param Request $request
    */
	public function login(Request $request)
	{
		$credentials = $request->validate([
			'username' => 'required',
			'password' => 'required'
		]); 
		
		if (Auth::attempt($credentials)) {

			$request->session()->regenerate();

			return response()->json([
				'id' => auth()->user()->id,
				'name' => auth()->user()->name,
				'username' => auth()->user()->username,
				'token' => auth()->user()->createToken('authToken')->plainTextToken
			]);
		}
	}

   /**
    * logout
    *
    * @param Request $request
    * 
    * @return JsonResponse
    */
   public function logout(Request $request): JsonResponse
   {
		if (auth()->check()) {
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			Auth::logout();
		}

		return new JsonResponse(
			null,
			Response::HTTP_NO_CONTENT
		);
   }

	public function register(CreateUserRequest $request)
	{
		$credentials = $request->validated(); 
		$credentials['password'] = Hash::make($credentials['password']);

		Auth::login(User::create($credentials));

		request()->session()->regenerate();

		return response()->json([
			'id' => auth()->user()->id,
			'name' => auth()->user()->name,
			'username' => auth()->user()->username,
			'token' => auth()->user()->createToken('authToken')->plainTextToken
		]);
	}
}
