<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CountryController;

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
Route::get('/favorite', [NewsController::class, 'showFavoritePage'])->name('user.news.favorite');
Route::get('/non_user', [NewsController::class, 'showNonUser'])->name('user.news.non_user');
Route::get('/search', [NewsController::class, 'showSearch'])->name('news.search');
Route::get('/{news_id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/search/category', [NewsController::class, 'filter'])->name('news.filter');
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::get('/profile/{user_id}', [UserController::class, 'show'])->name('user.profile.show');
});
Route::get('/category/{category_id}', [CategoryController::class, 'show'])->name('news.category');
Route::get('/country/{country_id}', [CountryController::class, 'show'])->name('news.country');
Route::get('/favorite', [NewsController::class, 'showFavoritePage'])->name('user.news.favorite');
Route::get('/non_user', [NewsController::class, 'showNonUser'])->name('user.news.non_user');
Route::get('/search', [NewsController::class, 'showSearch'])->name('news.search');
Route::get('/{news_id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/search/category', [NewsController::class, 'filter'])->name('news.filter');
Route::get('/country/{country_id}', [CountryController::class, 'show'])->name('news.country');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [AdminNewsController::class, 'showDashboard'])->name('show.dashboard');
        Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
            Route::get('create', [AdminNewsController::class, 'create'])->name('create');
            Route::post('store', [AdminNewsController::class, 'store'])->name('store');
            Route::get('edit/{news_id}', [AdminNewsController::class, 'edit'])->name('edit');
            Route::patch('{news_id}', [AdminNewsController::class, 'update'])->name('update');
            Route::get('show', [AdminNewsController::class, 'show'])->name('show');
            Route::delete('destroy/{user_id}', [AdminNewsController::class, 'destroy'])->name('destroy');
            Route::get('restore/{user_id}', [AdminNewsController::class, 'restore'])->name('restore');
        });
        Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
            Route::get('show', [AdminCommentController::class, 'show'])->name('show');
            Route::delete('destroy/{user_id}', [AdminCommentController::class, 'destroy'])->name('destroy');
            Route::get('restore/{user_id}', [AdminCommentController::class, 'restore'])->name('restore');
        });
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('show', [AdminUserController::class, 'show'])->name('show');
            Route::delete('destroy/{user_id}', [AdminUserController::class, 'destroy'])->name('destroy');
            Route::get('restore/{user_id}', [AdminUserController::class, 'restore'])->name('restore');
        });
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
            Route::get('post', [ProfileController::class, 'update'])->name('post');
        });
    });
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::get('show', [AdminCommentController::class, 'show'])->name('show');
        Route::delete('destroy/{user_id}', [AdminCommentController::class, 'destroy'])->name('destroy');
        Route::get('restore/{user_id}', [AdminCommentController::class, 'restore'])->name('restore');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('show', [AdminUserController::class, 'show'])->name('show');
        Route::delete('destroy/{user_id}', [AdminUserController::class, 'destroy'])->name('destroy');
        Route::get('restore/{user_id}', [AdminUserController::class, 'restore'])->name('restore');
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
        Route::get('post', [ProfileController::class, 'update'])->name('post');
    });
});
