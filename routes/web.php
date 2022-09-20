<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\CountryController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\ReactionController;
use App\Http\Controllers\User\BookmarkController;

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
Route::get('/api-news', [ApiController::class, 'getApiNews'])->name('news.api');
Auth::routes();

// All user
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::post('/search', [NewsController::class, 'showSearch'])->name('news.search');
Route::get('/{news_id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/{news_id}/all-comments', [NewsController::class, 'showAllComments'])->name('news.all-comments');
Route::get('/search/category', [NewsController::class, 'filter'])->name('news.filter');
Route::get('/category/{category_id}', [CategoryController::class, 'show'])->name('news.category');
Route::get('/country/{country_id}', [CountryController::class, 'show'])->name('news.country');
Route::get('/media/{media_id}', [MediaController::class, 'show'])->name('news.media');

// Logged in user
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::post('/thumbs_up', [ReactionController::class, 'thumbs_up'])->name('thumbs_up');
    Route::post('/thumbs_down', [ReactionController::class, 'thumbs_down'])->name('thumbs_down');
    Route::post('/bookmark', [BookmarkController::class, 'bookmark'])->name('bookmark');
    Route::group(['prefix' => 'favorite', 'as' => 'news.'], function () {
        Route::get('/', [NewsController::class, 'showFavoritePage'])->name('favorite');
        Route::get('/country/{country}', [NewsController::class, 'showFavoritePageByCountry'])->name('favorite.country');
        Route::get('/source/{source}', [NewsController::class, 'showFavoritePageBySource'])->name('favorite.source');
    });
    Route::post('/{news_id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{comment_id}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
        Route::get('/show/likes/{user_id}', [UserController::class, 'showLikes'])->name('show.likes');
        Route::get('/show/bookmarks/{user_id}', [UserController::class, 'showBookmarks'])->name('show.bookmarks');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    });
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
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
});

// Google Authentication
Route::get('/login/google', [GoogleLoginController::class, 'getGoogleAuth'])->name('google.login');
Route::get('/login/google/callback', [GoogleLoginController::class, 'authGoogleCallback']);

// Facebook Authentication
Route::get('/login/facebook', [FacebookLoginController::class, 'getFacebookAuth'])->name('facebook.login');
Route::get('login/facebook/callback', [FacebookLoginController::class, 'authFacebookCallback']);
