<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/post_login', [UserController::class, 'post_login'])->name('post_login');
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/post_register', [UserController::class, 'post_register'])->name('post_register');


Route::get('/login', function () {
    return view('login');
});

Route::get('cars', [IndexController::class, 'index'])->middleware('auth');


Route::get('cars/{id}', [\App\Http\Controllers\CarsController::class, 'show']);

Route::get('/welcome', [DashboardController::class, 'index']);