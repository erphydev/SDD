<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// GET /api/users
// POST /api/users
// GET /api/users/{id}
// PUT /api/users/{id}
// DELETE /api/users/{id}

Route::apiResource('users', UserController::class);
Route::apiResource('coaches', CoachController::class);
Route::apiResource('admins', AdminController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('payments', PaymentController::class);



