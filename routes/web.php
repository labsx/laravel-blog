<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);
Route::get('/register', [PostController::class, 'register']);
Route::post('/register', [PostController::class, 'store']);
Route::post('/logout', [PostController::class, 'logout']);
Route::get('/login', [PostController::class, 'display']);
Route::post('/login', [PostController::class, 'login']);
Route::get('/dashboard', [PostController::class, 'dashboard']);
Route::get('/edit/{post}', [PostController::class, 'view']);
Route::put('/edit/{post}', [PostController::class, 'edit']);
Route::delete('/delete/{post}', [PostController::class, 'delete']);




