<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// --- PUBLIC ROUTES (Login/Register) ---
// User controller 
Route::get('/cities', [CityController::class, 'index']);

Route::post('/send-otp', [UserController::class, 'sendOtp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);



// --- PROTECTED ROUTES ---
Route::middleware('auth:sanctum')->group(function () {

    Route::put('/profile', [UserController::class, 'updateProfile']);
    Route::get('/user', [UserController::class, 'getUser']);

    // Logout
    Route::post('/logout', [UserController::class, 'logout']);


    
    // --- NEW: Cart Module Routes ---
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::put('/cart/update', [CartController::class, 'updateCartItem']);
    Route::delete('/cart/remove', [CartController::class, 'removeCartItem']);

});