<?php

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

Route::get('/getuser-data', [\App\Http\Controllers\API\V1\AuthController::class, 'show']);