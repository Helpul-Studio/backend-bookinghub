<?php

use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Admin\OutletFasilityController;
use App\Http\Controllers\Admin\OutletImageController;
use App\Http\Controllers\Admin\OutletRoomController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register-user', [\App\Http\Controllers\API\V1\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\API\V1\AuthController::class, 'login']);

Route::get('/outlet-data', [\App\Http\Controllers\API\V1\OutletController::class, 'index']);
Route::get('/outlet-data/{id}', [\App\Http\Controllers\API\V1\OutletController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/profile', [\App\Http\Controllers\API\V1\AuthController::class, 'show']);
    Route::put('/update-profile', [\App\Http\Controllers\API\V1\AuthController::class, 'update']);
    Route::post('/logout', [\App\Http\Controllers\API\V1\AuthController::class, 'logout']);

    Route::get('/checkout-data', [App\Http\Controllers\API\V1\CheckoutController::class, 'index']);
    Route::post('/checkout', [App\Http\Controllers\API\V1\CheckoutController::class, 'store']);
    Route::get('/checkout/{id}', [\App\Http\Controllers\API\V1\CheckoutController::class, 'show']);

});

