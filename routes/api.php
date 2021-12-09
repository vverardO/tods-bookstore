<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\{
    LoginController,
    LogoutController,
    RegisterController
};
use App\Http\Controllers\{
    BookController,
    BookStatusController
};

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', LogoutController::class);

    Route::apiResource('books', BookController::class);
    Route::apiResource('booksStatusses', BookStatusController::class);
});
