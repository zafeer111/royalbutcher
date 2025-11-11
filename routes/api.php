<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\PhoneNumberPageController;
use App\Http\Controllers\Api\SelectCityPageController;
use App\Http\Controllers\Api\SplashScreenController;
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


Route::get('/cities', [CityController::class, 'index']);
Route::get('/content/splash-screen', [SplashScreenController::class, 'getSplash']);
Route::get('/content/select-city-page', [SelectCityPageController::class, 'getCityPageContent']); 
Route::get('/content/phone-number-page', [PhoneNumberPageController::class, 'getPageContent']);

// --- PUBLIC ROUTES (Login/Register) ---
// User controller 
Route::post('/send-otp', [UserController::class, 'sendOtp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);


// --- NEW: Public Item Routes ---
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/hot-discounts', [ItemController::class, 'hotDiscounts']);
Route::get('/items/{item}', [ItemController::class, 'show']);


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

    
    // --- NEW: Address Module Routes ---
    Route::apiResource('addresses', AddressController::class);
    Route::patch('/addresses/{address}/set-default', [AddressController::class, 'setDefault']);
});
