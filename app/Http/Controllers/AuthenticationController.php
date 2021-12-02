<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        $user->token = $user->createToken('api')->plainTextToken;
        $user->save();

        return UserResource::make($user);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        if(auth()->user()->tokens->isEmpty()) {
            $token = auth()->user()->createToken('api')->plainTextToken;
            auth()->user()->token = $token;
            auth()->user()->save();
        }

        return UserResource::make(auth()->user());
    }

    public function logout()
    {
        auth()->user()->token = null;
        auth()->user()->save();
        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true
        ], Response::HTTP_NO_CONTENT);
    }
}
