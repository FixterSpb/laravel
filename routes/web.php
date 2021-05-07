<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

require __DIR__.'/auth.php';
