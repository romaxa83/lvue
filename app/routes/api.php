<?php

use App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Route;

Route::post('login', [V1\Auth\AuthController::class, 'login'])->name('api.v1.auth.login');
Route::post('register', [V1\Auth\AuthController::class, 'register'])->name('api.v1.auth.register');

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'admin'
], function(){
    // Auth
    Route::post('logout', [V1\Auth\AuthController::class, 'logout'])->name('api.v1.auth.logout');
    // Auth user
    Route::get('user', [V1\Auth\AuthController::class, 'user'])->name('api.v1.auth.user');
    Route::post('profile/edit', [V1\Admin\User\ProfileController::class, 'edit'])->name('api.v1.admin.profile.edit');
    // User
    Route::get('users', [V1\Admin\User\UserController::class, 'list'])->name('api.v1.admin.user.list');
    Route::get('users/{user}', [V1\Admin\User\UserController::class, 'one'])->name('api.v1.admin.user.one');
    Route::post('users', [V1\Admin\User\UserController::class, 'create'])->name('api.v1.admin.user.create');
    Route::post('users/{user}', [V1\Admin\User\UserController::class, 'edit'])->name('api.v1.admin.user.edit');
    Route::delete('users/{user}', [V1\Admin\User\UserController::class, 'delete'])->name('api.v1.admin.user.delete');
    // Roles
    Route::get('roles', [V1\Admin\User\RoleController::class, 'list'])->name('api.v1.admin.role.list');
    Route::get('roles/{role}', [V1\Admin\User\RoleController::class, 'one'])->name('api.v1.admin.role.one');
    Route::post('roles', [V1\Admin\User\RoleController::class, 'create'])->name('api.v1.admin.role.create');
    Route::post('roles/{role}', [V1\Admin\User\RoleController::class, 'edit'])->name('api.v1.admin.role.edit');
    Route::delete('roles/{role}', [V1\Admin\User\RoleController::class, 'delete'])->name('api.v1.admin.role.delete');
    // Product
    Route::get('products', [V1\Admin\Product\ProductController::class, 'list'])->name('api.v1.admin.product.list');
    Route::get('products/{product}', [V1\Admin\Product\ProductController::class, 'one'])->name('api.v1.admin.product.one');
    Route::post('products', [V1\Admin\Product\ProductController::class, 'create'])->name('api.v1.admin.product.create');
    Route::post('products/{product}', [V1\Admin\Product\ProductController::class, 'edit'])->name('api.v1.admin.product.edit');
    Route::delete('products/{product}', [V1\Admin\Product\ProductController::class, 'delete'])->name('api.v1.admin.product.delete');
    // Order
    Route::get('orders', [V1\Admin\Order\OrderController::class, 'list'])->name('api.v1.admin.order.list');
    Route::get('orders/export', [V1\Admin\Order\OrderController::class, 'export'])->name('api.v1.admin.order.export');
    Route::get('orders/{order}', [V1\Admin\Order\OrderController::class, 'one'])->name('api.v1.admin.order.one');
    Route::post('orders', [V1\Admin\Order\OrderController::class, 'create'])->name('api.v1.admin.order.create');
    Route::post('orders/{order}', [V1\Admin\Order\OrderController::class, 'edit'])->name('api.v1.admin.order.edit');
    Route::delete('order/{order}', [V1\Admin\Order\OrderController::class, 'delete'])->name('api.v1.admin.order.delete');
    // Permissions
    Route::get('permissions', [V1\Admin\User\PermissionController::class, 'list'])->name('api.v1.admin.permission.list');
    // Upload
    Route::post('upload', [V1\Admin\Media\UploadController::class, 'upload'])->name('api.v1.admin.file.upload');
    // Dashboard
    Route::get('chart', [V1\Admin\Dashboard\DashboardController::class, 'chart'])->name('api.v1.admin.dashboard.chart');
});

//Route::middleware('auth:api')->group(function() {
//
//
//});
