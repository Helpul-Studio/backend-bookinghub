<?php

use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Admin\OutletFasilityController;
use App\Http\Controllers\Admin\OutletImageController;
use App\Http\Controllers\Admin\OutletRoomController;
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

Route::get('/outlets', [App\Http\Controllers\Admin\OutletController::class, 'index']);
Route::get('/data-outlets', [App\Http\Controllers\Admin\OutletController::class, 'show']);
Route::post('/add-outlets', [App\Http\Controllers\Admin\OutletController::class, 'store']);
Route::put('/update-outlets/{id}', [App\Http\Controllers\Admin\OutletController::class, 'update']);
Route::delete('/delete-outlets/{id}', [App\Http\Controllers\Admin\OutletController::class, 'destroy']);

Route::get('/outlets-room', [OutletRoomController::class, 'index']);
Route::get('/data-outlets-room', [OutletRoomController::class, 'show']);
Route::get('/get-outlets-room/{id}', [OutletRoomController::class, 'edit']);
Route::post('/add-outlets-room', [OutletRoomController::class, 'store']);
Route::put('/update-outlets-room/{id}', [OutletRoomController::class, 'update']);
Route::delete('/delete-outlets-room/{id}', [OutletRoomController::class, 'destroy']);

Route::get('/outlets-facility', [OutletFasilityController::class, 'index']);
Route::get('/data-outlets-facility', [OutletFasilityController::class, 'show']);
Route::get('/get-outlets-facility/{id}', [OutletFasilityController::class, 'edit']);
Route::post('/add-outlets-facility', [OutletFasilityController::class, 'store']);
Route::put('/update-outlets-facility/{id}', [OutletFasilityController::class, 'update']);
Route::delete('/delete-outlets-facility/{id}', [OutletFasilityController::class, 'destroy']);

Route::get('/outlets-image', [OutletImageController::class, 'index']);
Route::get('/data-outlets-image', [OutletImageController::class, 'show']);
Route::post('/add-outlets-image', [OutletImageController::class, 'store']);
Route::put('/update-outlets-image/{id}', [OutletImageController::class, 'update']);
Route::delete('/delete-outlets-image/{id}', [OutletImageController::class, 'destroy']);


Route::post('/register-user', [\App\Http\Controllers\API\V1\AuthController::class, 'register']);

Route::get('/getuser-data', [\App\Http\Controllers\API\V1\AuthController::class, 'show']);
