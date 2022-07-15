<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
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

Route::group(['middleware' => ['XssSanitizer']], function () {
    Route::prefix('auth')->group(function() {
        Route::post('/login', [UserController::class, 'login'])->name('login');
    });

    Route::group(['middleware' => ['auth:api']], function() {

        Route::group(['prefix' => 'vehicle'], function () {
            Route::get('/', [VehicleController::class, 'index'])->name('all');
            Route::post('/', [VehicleController::class, 'store'])->name('create');
            Route::put('/{uuid}', [VehicleController::class, 'update'])->name('update');
            Route::put('/archive/{uuid}', [VehicleController::class, 'archive'])->name('archive');
        });



    });
});

