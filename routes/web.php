<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\SelectCityPageController;
use App\Http\Controllers\Admin\SplashScreenController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\UserController;

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/profile', [RegisteredUserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [RegisteredUserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/change-password', [RegisteredUserController::class, 'changePassword'])->name('user.change-password');
    Route::get('/home', fn() => view('index'))->name('home');
    // Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    // Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    // Route::get('{any}', [RoutingController::class, 'root'])->name('any');

    // User Management
    Route::group(['middleware' => ['can:user_management']], function () {
        Route::resource('user-management', UserController::class);
        Route::resource('role-management', RoleController::class);
    });


    // Category Management
    Route::resource('categories', CategoryController::class);

    // NEW: Item Management
    Route::resource('items', ItemController::class);


    // --- NEW: Splash Screen CRUD (Dynamic Content) ---
    Route::resource('splash-screens', SplashScreenController::class);
    Route::resource('select-city-pages', SelectCityPageController::class);
});
