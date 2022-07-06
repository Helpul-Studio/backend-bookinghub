<?php

use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Admin\OutletFasilityController;
use App\Http\Controllers\Admin\OutletRoomController;
use App\Http\Controllers\Admin\OutletImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);
    
    Route::get('/outlets', [OutletController::class, 'index']);
    Route::get('/data-outlets', [OutletController::class, 'show']);
    Route::post('/add-outlets', [OutletController::class, 'store']);
    Route::put('/update-outlets/{id}', [OutletController::class, 'update']);
    Route::delete('/delete-outlets/{id}', [OutletController::class, 'destroy']);

    Route::get('/outlets-facility', [OutletFasilityController::class, 'index']);
    Route::get('/data-outlets-facility', [OutletFasilityController::class, 'show']);
    Route::post('/add-outlets-facility', [OutletFasilityController::class, 'store']);
    Route::put('/update-outlets-facility/{id}', [OutletFasilityController::class, 'update']);
    Route::delete('/delete-outlets-facility/{id}', [OutletFasilityController::class, 'destroy']);

    Route::get('/outlets-room', [OutletRoomController::class, 'index']);
    Route::get('/data-outlets-room', [OutletRoomController::class, 'show']);
    Route::post('/add-outlets-room', [OutletRoomController::class, 'store']);
    Route::put('/update-outlets-room/{id}', [OutletRoomController::class, 'update']);
    Route::delete('/delete-outlets-room/{id}', [OutletRoomController::class, 'destroy']);

    Route::get('/outlets-image', [OutletImageController::class, 'index']);
    Route::get('/data-outlets-image', [OutletImageController::class, 'show']);
    Route::post('/add-outlets-image', [OutletImageController::class, 'store']);
    Route::put('/update-outlets-image/{id}', [OutletImageController::class, 'update']);
    Route::delete('/delete-outlets-image/{id}', [OutletImageController::class, 'destroy']);
    
});
