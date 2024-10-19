<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\PersonController;

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

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('admin', fn (Request $request) => $request->user())->name('admin');
});

Route::prefix('admins')->group(function () {
    Route::prefix('persons')->group(function () {
        Route::get('/', [PersonController::class, 'index']);

        Route::post('/', [PersonController::class, 'store']);
        Route::patch('/id', [PersonController::class, 'update']);

        Route::delete('/id', [PersonController::class, 'destroy']);
    });
});
