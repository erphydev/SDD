<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| مسیرهای عمومی (بدون نیاز به توکن)
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);

Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

/*
|--------------------------------------------------------------------------
| مسیرهای محافظت شده (نیاز به توکن Bearer)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('users', UserController::class);

    Route::apiResource('coaches', CoachController::class);

    Route::get('/me', [UserController::class, 'index']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
