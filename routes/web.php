<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\NewsController;


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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('news/create', [AdminNewsController::class, 'add'])->name('admin.news.add');
    Route::post('news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::get('news', [AdminNewsController::class, 'index'])->name('admin.news');
    Route::get('news/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::get('news/edit', [AdminNewsController::class, 'update'])->name('admin.news.update');;
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('profile/post', [ProfileController::class, 'update'])->name('admin.profile.post');
});
