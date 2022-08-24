<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\UserController;

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

Auth::routes();

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/{news_id}',[NewsController::class, 'show'])->name('news.show');
// tentative route to filtered page for user
Route::get('/profile/{user_id}',[UserController::class, 'index'])->name('user.profile.index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('news/create', [AdminNewsController::class, 'add'])->name('admin.news.add');
    Route::post('news/store', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/edit/{news_id}', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::patch('news/{news_id}', [AdminNewsController::class, 'update'])->name('admin.news.update');;
    // Route::post('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');

    Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('profile/post', [ProfileController::class, 'update'])->name('admin.profile.post');
});
