<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\FacebookLoginController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\CountryController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\ReactionController;
use App\Http\Controllers\User\BookmarkController;
use App\Http\Controllers\User\FollowController;
use App\Http\Controllers\Auth\VerificationController;

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

Auth::routes(['verify' => true]);

// All user
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/create-news', [NewsController::class, 'editor'])->name('news.editor');
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::post('/search', [NewsController::class, 'showSearch'])->name('news.search');
Route::get('/{news_id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/{news_id}/all-comments', [NewsController::class, 'showAllComments'])->name('news.all-comments');
Route::get('/search/category', [NewsController::class, 'filter'])->name('news.filter');
Route::get('/category/{category_id}', [CategoryController::class, 'show'])->name('news.category');
Route::get('/country/{country_id}', [CountryController::class, 'show'])->name('news.country');
Route::get('/media/{media_id}', [MediaController::class, 'show'])->name('news.media');

// Logged in user
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'verified'], function () {
    Route::post('/like', [ReactionController::class, 'like'])->name('like');
    Route::post('/dislike', [ReactionController::class, 'dislike'])->name('dislike');
    Route::post('/follow', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::post('/bookmark', [BookmarkController::class, 'bookmark'])->name('bookmark');
    Route::group(['prefix' => 'favorite', 'as' => 'news.'], function () {
        Route::get('/', [NewsController::class, 'showFavoritePage'])->name('favorite');
        Route::get('/country/{country}', [NewsController::class, 'showFavoritePageByCountry'])->name('favorite.country');
        Route::get('/source/{source}', [NewsController::class, 'showFavoritePageBySource'])->name('favorite.source');
    });
    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::post('/like', [CommentController::class, 'like'])->name('like');
        Route::post('/{news_id}', [CommentController::class, 'store'])->name('store');
        Route::delete('/{comment_id}', [CommentController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/show/{user_id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit', [UserController::class, 'edit'])->name('edit');
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
        Route::get('list', [AdminNewsController::class, 'index'])->name('list');
        Route::patch('display/{user_id}', [AdminNewsController::class, 'display'])->name('display');
        Route::patch('draft/{user_id}', [AdminNewsController::class, 'draft'])->name('draft');
        Route::delete('destroy/{user_id}', [AdminNewsController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::get('list', [CommentController::class, 'index'])->name('list');
        Route::get('restore/{user_id}', [CommentController::class, 'restore'])->name('restore');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('list', [UserController::class, 'index'])->name('list');
        Route::delete('destroy/{user_id}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('restore/{user_id}', [UserController::class, 'restore'])->name('restore');
    });
    Route::get('/create', [MailController::class, 'create'])->name('create');
    Route::post('/sendmail', [MailController::class, 'sendMail'])->name('mail');
});

// Google Authentication
Route::get('/login/google', [GoogleLoginController::class, 'getGoogleAuth'])->name('google.login');
Route::get('/login/google/callback', [GoogleLoginController::class, 'authGoogleCallback']);

// Facebook Authentication
Route::get('/login/facebook', [FacebookLoginController::class, 'getFacebookAuth'])->name('facebook.login');
Route::get('login/facebook/callback', [FacebookLoginController::class, 'authFacebookCallback']);
