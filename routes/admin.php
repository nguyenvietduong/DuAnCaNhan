<?php
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;


use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\User\EditorController;
use App\Http\Controllers\Backend\User\AdminController;
use App\Http\Controllers\Backend\PostController;

use App\Http\Controllers\Backend\SystemController;

use Illuminate\Support\Facades\Route;


/* ROUTE AJAX */
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\TagController;

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {
        Route::get('',                      [DashboardController::class, 'index'])->name('dashboard.index');

        Route::group(['prefix' => 'user'], function () {
            Route::get('index',             [UserController::class, 'index'])->name('user.index');
            Route::get('create',            [UserController::class, 'create'])->name('user.create');
            Route::post('store',            [UserController::class, 'store'])->name('user.store');
            Route::get('{id}/edit',         [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
            Route::post('{id}/update',      [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
            Route::get('{id}/delete',       [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete');
            Route::delete('{id}/destroy',   [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy');
        });

        Route::group(['prefix' => 'editor'], function () {
            Route::get('index',             [EditorController::class, 'index'])->name('editor.index');
            Route::get('create',            [EditorController::class, 'create'])->name('editor.create');
            Route::post('store',            [EditorController::class, 'store'])->name('editor.store');
            Route::get('{id}/edit',         [EditorController::class, 'edit'])->where(['id' => '[0-9]+'])->name('editor.edit');
            Route::post('{id}/update',      [EditorController::class, 'update'])->where(['id' => '[0-9]+'])->name('editor.update');
            Route::get('{id}/delete',       [EditorController::class, 'delete'])->where(['id' => '[0-9]+'])->name('editor.delete');
            Route::delete('{id}/destroy',   [EditorController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('editor.destroy');
        });

        Route::group(['prefix' => 'admin'], function () {
            Route::get('index',             [AdminController::class, 'index'])->name('admin.index');
            Route::get('create',            [AdminController::class, 'create'])->name('admin.create');
            Route::post('store',            [AdminController::class, 'store'])->name('admin.store');
            Route::get('{id}/edit',         [AdminController::class, 'edit'])->where(['id' => '[0-9]+'])->name('admin.edit');
            Route::post('{id}/update',      [AdminController::class, 'update'])->where(['id' => '[0-9]+'])->name('admin.update');
            Route::get('{id}/delete',       [AdminController::class, 'delete'])->where(['id' => '[0-9]+'])->name('admin.delete');
            Route::delete('{id}/destroy',   [AdminController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('admin.destroy');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('index',             [CategoryController::class, 'index'])->name('category.index');
            Route::get('create',            [CategoryController::class, 'create'])->name('category.create');
            Route::post('store',            [CategoryController::class, 'store'])->name('category.store');
            Route::get('{id}/edit',         [CategoryController::class, 'edit'])->where(['id' => '[0-9]+'])->name('category.edit');
            Route::post('{id}/update',      [CategoryController::class, 'update'])->where(['id' => '[0-9]+'])->name('category.update');
            Route::get('{id}/delete',       [CategoryController::class, 'delete'])->where(['id' => '[0-9]+'])->name('category.delete');
            Route::delete('{id}/destroy',   [CategoryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('category.destroy');
        });

        Route::group(['prefix' => 'tag'], function () {
            Route::get('index',             [TagController::class, 'index'])->name('tag.index');
            Route::get('create',            [TagController::class, 'create'])->name('tag.create');
            Route::post('store',            [TagController::class, 'store'])->name('tag.store');
            Route::get('{id}/edit',         [TagController::class, 'edit'])->where(['id' => '[0-9]+'])->name('tag.edit');
            Route::post('{id}/update',      [TagController::class, 'update'])->where(['id' => '[0-9]+'])->name('tag.update');
            Route::get('{id}/delete',       [TagController::class, 'delete'])->where(['id' => '[0-9]+'])->name('tag.delete');
            Route::delete('{id}/destroy',   [TagController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('tag.destroy');
        });

        Route::group(['prefix' => 'article'], function () {
            Route::get('index',             [ArticleController::class, 'index'])->name('article.index');
            Route::get('create',            [ArticleController::class, 'create'])->name('article.create');
            Route::post('store',            [ArticleController::class, 'store'])->name('article.store');
            Route::get('{id}/edit',         [ArticleController::class, 'edit'])->where(['id' => '[0-9]+'])->name('article.edit');
            Route::post('{id}/update',      [ArticleController::class, 'update'])->where(['id' => '[0-9]+'])->name('article.update');
            Route::get('{id}/delete',       [ArticleController::class, 'delete'])->where(['id' => '[0-9]+'])->name('article.delete');
            Route::delete('{id}/destroy',   [ArticleController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('article.destroy');
        });

        Route::group(['prefix' => 'system'], function () {
            Route::get('index',             [SystemController::class, 'index'])->name('system.index');
            Route::post('store',            [SystemController::class, 'store'])->name('system.store');
        });
    });



//ROUTES AJAX

Route::get('ajax/location/getLocation',         [LocationController::class, 'getLocation'])->name('ajax.location.index');
Route::post('ajax/dashboard/changeStatus',      [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll',   [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');
