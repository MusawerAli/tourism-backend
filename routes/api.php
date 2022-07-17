<?php

use App\Http\Controllers\ApiController\DriverController;
use App\Http\Controllers\ApiController\PassangerController;
use App\Http\Controllers\ApiController\TransferController;
use App\Http\Controllers\ApiController\UserController;
use App\Http\Controllers\ApiController\VehicleController;
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

    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::group(['prefix' => 'vehicle'], function () {
            Route::get('/', [VehicleController::class, 'index'])->name('index');
            Route::get('/{uuid}', [VehicleController::class, 'show'])->name('show');
            Route::post('/', [VehicleController::class, 'store'])->name('create');
            Route::put('/{uuid}', [VehicleController::class, 'update'])->name('update');
            Route::delete('{uuid}', [VehicleController::class, 'archive'])->name('archive');
        });

        Route::group(['prefix' => 'passanger'], function () {
            Route::get('/', [PassangerController::class, 'index'])->name('index');
            Route::get('/{uuid}', [PassangerController::class, 'show'])->name('show');
            Route::post('/', [PassangerController::class, 'store'])->name('create');
            Route::put('/{uuid}', [PassangerController::class, 'update'])->name('update');
            Route::delete('{uuid}', [PassangerController::class, 'archive'])->name('archive');
        });

        Route::group(['prefix' => 'driver'], function () {
            Route::get('/', [DriverController::class, 'index'])->name('index');
            Route::get('/{uuid}', [DriverController::class, 'show'])->name('show');
            Route::post('/', [DriverController::class, 'store'])->name('create');
            Route::put('/{uuid}', [DriverController::class, 'update'])->name('update');
            Route::delete('{uuid}', [DriverController::class, 'archive'])->name('archive');
        });

        Route::group(['prefix' => 'transfer'], function () {
            Route::get('/', [TransferController::class, 'index'])->name('index');
            Route::get('/{uuid}', [TransferController::class, 'show'])->name('show');
            Route::post('/', [TransferController::class, 'store'])->name('create');
            Route::put('/{uuid}', [TransferController::class, 'update'])->name('update');
            Route::put('/updateStatus/{uuid}', [TransferController::class, 'updateStatus'])->name('updateStatus');
        });



    });
});

