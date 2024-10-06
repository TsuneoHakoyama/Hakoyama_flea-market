<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StripeController;
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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.login');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.login.logout');

    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('index/{user_id}', [AdminController::class, 'userComments'])->name('admin.comment');
    Route::post('comment/delete', [AdminController::class, 'removeComment'])->name('admin.comment.delete');
    Route::post('user/delete', [AdminController::class, 'removeUser'])->name('admin.user.delete');
});

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::get('logout', [LogoutController::class, 'destroy'])->name('logout');
Route::get('/', [ItemController::class, 'show'])->name('home');
Route::get('mylist', [ItemController::class, 'myList'])->name('mylist');
Route::post('search', [ItemController::class, 'search']);
Route::get('item/{item_id}', [ItemController::class, 'detailItem'])->name('detail');


Route::post('/like/{item_id}', [FavoriteController::class, 'create'])->name('like');
Route::post('/unlike/{item_id}', [FavoriteController::class, 'delete'])->name('unlike');
Route::get('/item/{item_id}/comment', [CommentController::class, 'show'])->name('comment');
Route::post('/item/{item_id}/comment', [CommentController::class, 'create'])->name('create');
Route::post('/delete', [CommentController::class, 'remove']);
Route::get('/purchase/{item_id}', [PurchaseController::class, 'confirm'])->name('confirm');
Route::post('/buy', [PurchaseController::class, 'purchase']);
Route::post('/charge', [StripeController::class, 'payByCard'])->name('stripe');
Route::get('profile', [ProfileController::class, 'create'])->name('profile');
Route::post('/profile/store', [ProfileController::class, 'store']);
Route::get('/purchase/address/{item_id}', [ProfileController::class, 'updateAddress'])->name('address');
Route::post('/purchase/address/update', [ProfileController::class, 'changeAddress']);
Route::get('/mypage', [MypageController::class, 'sellList'])->name('mypage');
Route::get('/buylist', [MypageController::class, 'buyList'])->name('buylist');
Route::get('/sell', [SellController::class, 'create'])->name('sell');
Route::post('/sell', [SellController::class, 'store']);

