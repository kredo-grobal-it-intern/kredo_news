<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\CategoryController;


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
Route::get('/search/category',[NewsController::class, 'filter'])->name('news.filter');

Route::get('/category/{category_id}',[CategoryController::class, 'show'])->name('news.category');

Route::group(['middleware' => 'auth'],function(){

  Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
      Route::get('news/create', [AdminNewsController::class, 'create'])->name('news.create');
      Route::post('news/store', [AdminNewsController::class, 'store'])->name('news.store');
      Route::get('news/edit/{news_id}', [AdminNewsController::class, 'edit'])->name('news.edit');
      Route::patch('news/{news_id}', [AdminNewsController::class, 'update'])->name('news.update');;

      Route::get('dashboard', [AdminNewsController::class, 'showDashboard'])->name('show.dashboard');
      
    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
      Route::get('show', [AdminNewsController::class, 'show'])->name('show');

    });
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
      Route::get('show', [AdminCommentController::class, 'show'])->name('show');

    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
      Route::get('show', [AdminUserController::class, 'show'])->name('show');

    });


  });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('profile/post', [ProfileController::class, 'update'])->name('admin.profile.post');
});
