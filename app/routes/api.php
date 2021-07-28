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
    // Product
    Route::get('products', [V1\Product\ProductController::class, 'list'])->name('api.v1.product.list');
    Route::get('products/{product}', [V1\Product\ProductController::class, 'one'])->name('api.v1.product.one');
    Route::post('products', [V1\Product\ProductController::class, 'create'])->name('api.v1.product.create');
    Route::post('products/{product}', [V1\Product\ProductController::class, 'edit'])->name('api.v1.product.edit');
    Route::delete('products/{product}', [V1\Product\ProductController::class, 'delete'])->name('api.v1.product.delete');
    // Order
    Route::get('orders', [V1\Order\OrderController::class, 'list'])->name('api.v1.order.list');
    Route::get('orders/export', [V1\Order\OrderController::class, 'export'])->name('api.v1.order.export');
    Route::get('orders/{order}', [V1\Order\OrderController::class, 'one'])->name('api.v1.order.one');
    Route::post('orders', [V1\Order\OrderController::class, 'create'])->name('api.v1.order.create');
    Route::post('orders/{order}', [V1\Order\OrderController::class, 'edit'])->name('api.v1.order.edit');
    Route::delete('order/{order}', [V1\Order\OrderController::class, 'delete'])->name('api.v1.order.delete');
    // Permissions
    Route::get('permissions', [V1\User\PermissionController::class, 'list'])->name('api.v1.permission.list');
    // Upload
    Route::post('upload', [V1\Media\UploadController::class, 'upload'])->name('api.v1.file.upload');
    // Dashboard
    Route::get('chart', [V1\Dashboard\DashboardController::class, 'chart'])->name('api.v1.dashboard.chart');
});
