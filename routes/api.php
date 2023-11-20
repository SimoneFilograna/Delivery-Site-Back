<?php

use App\Http\Controllers\Api\CuisineController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\OrderController;
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

//API for restaurants
Route::get("restaurants", [RestaurantController::class,"index"]);
Route::get("restaurants/{id}", [RestaurantController::class, "show"]);

//API for cuisines
Route::get("cuisines", [CuisineController::class,"index"]);

//API for checkout
Route::get("checkout/token", [CheckoutController::class,"index"]);
Route::post("checkout", [CheckoutController::class,"store"]);
Route::post("order", [OrderController::class,"store"]);
