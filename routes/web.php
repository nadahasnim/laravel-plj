<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [ManagementUserController::class, 'index']);

Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);

// AUTH
Route::get('/auth', AuthController::class)->name('auth')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->middleware('guest');

Route::get('/auth/signup', [AuthController::class, 'signup'])->name('signup')->middleware('guest');
Route::post('/auth/signup', [AuthController::class, 'store'])->middleware('guest');

Route::post('/auth/signout', [AuthController::class, 'signout'])->name('signout');

// DASHBOARD
Route::get('/admin/dashboard', DashboardController::class)->middleware('auth');
Route::resource('/admin/users', UserController::class)->middleware('auth');
