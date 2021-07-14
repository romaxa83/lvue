<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

Route::post('login', [V1\Auth\AuthController::class, 'login'])->name('api.v1.auth.login');
Route::post('register', [V1\Auth\AuthController::class, 'register'])->name('api.v1.auth.register');

Route::middleware('auth:api')->group(function() {

    Route::get('user', [V1\Auth\AuthController::class, 'user'])->name('api.v1.auth.user');
});
