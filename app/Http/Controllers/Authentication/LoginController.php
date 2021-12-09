<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        if (auth()->user()->tokens->isEmpty()) {
            $token = auth()->user()->createToken('api')->plainTextToken;
            auth()->user()->token = $token;
            auth()->user()->save();
        }

        return UserResource::make(auth()->user());
    }
}
