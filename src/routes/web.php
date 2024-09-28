<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellController;
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
Route::get('/mylist', [ItemController::class, 'myList'])->name('mylist');
Route::post('/search', [ItemController::class, 'search']);
Route::get('/item/{item_id}', [ItemController::class, 'detailItem'])->name('detail');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::post('/like/{item_id}', [FavoriteController::class, 'create'])->name('like');
Route::post('/unlike/{item_id}', [FavoriteController::class, 'delete'])->name('unlike');
Route::get('/item/{item_id}/comment', [CommentController::class, 'show'])->name('comment');
Route::post('/item/{item_id}/comment', [CommentController::class, 'create'])->name('create');
Route::post('/delete', [CommentController::class, 'remove']);
Route::get('/purchase/{item_id}', [PurchaseController::class, 'confirm'])->name('confirm');
Route::post('/buy', [PurchaseController::class, 'purchase']);
Route::get('logout', [LogoutController::class, 'destroy'])->name('logout');

Route::get('profile', [ProfileController::class, 'create'])->name('profile');
Route::post('/profile/store', [ProfileController::class, 'store']);
Route::get('/purchase/address/{item_id}', [ProfileController::class, 'updateAddress'])->name('address');
Route::post('/purchase/address/update', [ProfileController::class, 'changeAddress']);

Route::get('/mypage', [MypageController::class, 'sellList'])->name('mypage');
Route::get('/buylist', [MypageController::class, 'buyList'])->name('buylist');
Route::get('/sell', [SellController::class, 'create'])->name('sell');
Route::post('/sell', [SellController::class, 'store']);

