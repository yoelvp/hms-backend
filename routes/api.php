<?php

use App\Http\Controllers\Auth\UserAuthenticationController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/auth')->group(function () {
  Route::post('/login', [UserAuthenticationController::class, 'login']);
  Route::post('/register', [UserAuthenticationController::class, 'register']);
  Route::post('/reset-password/{id}', [UserAuthenticationController::class, 'resetPassword'])->middleware('auth:sanctum');
  Route::post('/logout', [UserAuthenticationController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('/rooms')->group(function () {
  Route::get('/', [RoomsController::class, 'getAll']);
})->middleware('auth:sanctum');
