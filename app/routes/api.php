<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

Route::post('login', [V1\Auth\AuthController::class, 'login'])->name('api.v1.auth.login');
Route::post('register', [V1\Auth\AuthController::class, 'register'])->name('api.v1.auth.register');

Route::middleware('auth:api')->group(function() {

    // Auth user
    Route::get('user', [V1\Auth\AuthController::class, 'user'])->name('api.v1.auth.user');
    // User
    Route::get('users', [V1\User\UserController::class, 'list'])->name('api.v1.user.list');
    Route::get('users/{user}', [V1\User\UserController::class, 'one'])->name('api.v1.user.one');
    Route::post('users', [V1\User\UserController::class, 'create'])->name('api.v1.user.create');
    Route::post('users/{user}', [V1\User\UserController::class, 'edit'])->name('api.v1.user.edit');
    Route::delete('users/{user}', [V1\User\UserController::class, 'delete'])->name('api.v1.user.delete');
    // Roles
    Route::get('roles', [V1\User\RoleController::class, 'list'])->name('api.v1.role.list');
    Route::get('roles/{role}', [V1\User\RoleController::class, 'one'])->name('api.v1.role.one');
    Route::post('roles', [V1\User\RoleController::class, 'create'])->name('api.v1.role.create');
    Route::post('roles/{role}', [V1\User\RoleController::class, 'edit'])->name('api.v1.role.edit');
    Route::delete('roles/{role}', [V1\User\RoleController::class, 'delete'])->name('api.v1.role.delete');
});
