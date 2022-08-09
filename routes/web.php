<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('news/create', [NewsController::class, 'add'])->middleware('auth');
    Route::post('news/create', [NewsController::class, 'create'])->middleware('auth');
    Route::get('news', [NewsController::class, 'index'])->middleware('auth');
    Route::get('news/edit', [NewsController::class, 'edit'])->middleware('auth');
    Route::get('news/edit', [NewsController::class, 'update'])->middleware('auth');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->middleware('auth');
    Route::get('profile/post', [ProfileController::class, 'update'])->middleware('auth');
});
