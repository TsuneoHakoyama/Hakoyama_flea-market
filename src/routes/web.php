<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [ItemController::class, 'show'])->name('home');
Route::post('/search', [ItemController::class, 'search']);
Route::get('/item/{id}', [ItemController::class, 'detailItem'])->name('detail');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::post('/like/{item_id}', [FavoriteController::class, 'create'])->name('like');
Route::post('/unlike/{item_id}', [FavoriteController::class, 'delete'])->name('unlike');
Route::get('logout', [LogoutController::class, 'destroy'])->name('logout');
