<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Http\Controllers\AuthController;
use Modules\UserManagement\Http\Controllers\UserController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post("/register", [AuthController::class, 'register']);
    Route::post("/login", [AuthController::class, 'login']);
    Route::post("/log-out", [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get("/", [UserController::class, 'index']);
        Route::get("/{user}/activate", [UserController::class, 'activate']);
    });
});
