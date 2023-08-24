<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);

Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'display']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/edit/{post}', [AdminController::class, 'view']);
Route::put('/edit/{post}', [AdminController::class, 'edit']);
Route::delete('/delete/{post}', [AdminController::class, 'delete']);




