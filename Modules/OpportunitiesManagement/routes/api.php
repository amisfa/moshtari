<?php

use Illuminate\Support\Facades\Route;
use Modules\OpportunitiesManagement\Http\Controllers\OpportunitiesController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::group(['prefix' => 'opportunities'], function () {
    Route::get("/", [OpportunitiesController::class, 'index']);
    Route::post("/store", [OpportunitiesController::class, 'store']);
    Route::post("/update", [OpportunitiesController::class, 'update']);
    Route::delete("/{opportunity}", [OpportunitiesController::class, 'store']);
    Route::post("/{opportunity}/change-status", [OpportunitiesController::class, 'changeStatus']);
});
