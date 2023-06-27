<?php

use App\Http\Controllers\Api\CarsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('cars', [Api\CarsController::class, 'index']);
Route::get('cars', [\App\Http\Controllers\CarsController::class, 'index']);
Route::post('cars', [\App\Http\Controllers\CarsController::class, 'store']);
Route::get('cars/{id}', [\App\Http\Controllers\CarsController::class, 'show']);
Route::post('cars/{id}', [\App\Http\Controllers\CarsController::class, 'update']);
Route::get('cars/delete/{id}', [\App\Http\Controllers\CarsController::class, 'delete']);
