<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', [V1\Auth\AuthController::class, 'register'])->name('api.v1.auth.register');
Route::post('login', [V1\Auth\AuthController::class, 'login'])->name('api.v1.auth.login');
