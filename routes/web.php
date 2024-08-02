<?php


/*FRONTEND */

// use App\Http\Controllers\Frontend\TourController as FrontendTourController;
// use App\Http\Controllers\Frontend\TourCategoryController as FrontendTourCategoryController;
// use App\Http\Controllers\Frontend\BookingDetailController as FrontendBookingDetail;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\ArticleDetailController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\TagController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',                                 [HomeController::class, 'index'])->name('home');
Route::get('/tag/{id}',                         [TagController::class, 'index'])->where(['id' => '[0-9]+'])->name('tag');
Route::get('/category/{id}',                    [CategoryController::class, 'index'])->where(['id' => '[0-9]+'])->name('category');
Route::get('/article-detail/{id}',              [ArticleDetailController::class, 'index'])->where(['id' => '[0-9]+'])->name('article.detail');
Route::post('/article-detail/add_comment/{id}', [ArticleDetailController::class, 'store'])->where(['id' => '[0-9]+'])->name('article.detail.add.comment');
Route::get('/search',                           [SearchController::class, 'index'])->where(['search' => '[a-zA-Z0-9]+'])->name('search');



Route::prefix('auth')
    ->group(function () {
        Route::get('login',                 [LoginController::class, 'showFormLogin'])->name('login');
        Route::post('login',                [LoginController::class, 'login']);

        Route::get('logout',                [LoginController::class, 'logout'])->name('logout');

        Route::get('register',              [RegisterController::class, 'showFormRegister'])->name('register');
        Route::post('register',             [RegisterController::class, 'register']);
    });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'isAdmin']);
