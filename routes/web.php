<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FeaturedController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Backend
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category
    Route::get('/create/category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/manage/category', [CategoryController::class, 'index'])->name('manage.category');
    Route::get('/destroy/category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update/category/{id}', [CategoryController::class, 'update'])->name('update.category');

    // Featured
    Route::get('/create/featured', [FeaturedController::class, 'create'])->name('create.featured');
    Route::post('/store/featured', [FeaturedController::class, 'store'])->name('store.featured');
    Route::get('/manage/featured', [FeaturedController::class, 'index'])->name('manage.featured');
    Route::get('/destroy/featured/{id}', [FeaturedController::class, 'destroy'])->name('destroy.featured');
    Route::get('/edit/featured/{id}', [FeaturedController::class, 'edit'])->name('edit.featured');
    Route::post('/update/featured/{id}', [FeaturedController::class, 'update'])->name('update.featured');
});
