<?php

use App\Http\Controllers\API\V1\OutletController;
use App\Http\Controllers\API\V1\OutletRoomController;
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

Route::get('/outlet', [OutletController::class, 'index']);
Route::post('/outlet', [OutletController::class, 'store']);
Route::put('/outlet/{id}', [OutletController::class, 'update']);
Route::delete('/outlet/{id}', [OutletController::class, 'destroy']);

Route::get('/outlet_room', [OutletRoomController::class, 'index']);
Route::post('/outlet_room', [OutletRoomController::class, 'store']);
Route::put('/outlet_room/{id}', [OutletRoomController::class, 'update']);
Route::delete('/outlet_room/{id}', [OutletRoomController::class, 'destroy']);



Route::post('/register-user', [\App\Http\Controllers\API\V1\AuthController::class, 'register']);

Route::get('/getuser-data', [\App\Http\Controllers\API\V1\AuthController::class, 'show']);