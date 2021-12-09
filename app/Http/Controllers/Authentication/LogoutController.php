<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->user()->token = null;
        auth()->user()->save();
        auth()->user()->tokens()->delete();

        return response()->json([
            'success' => true
        ], Response::HTTP_NO_CONTENT);
    }
}
