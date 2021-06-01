<?php

use App\Http\Controllers\AboutCommentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index.index');

Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->middleware(['auth'])->name('orders.create');
Route::post('/order/create', [OrderController::class, 'store'])->middleware(['auth'])->name('orders.store');
Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->middleware(['auth'])->name('orders.edit');
Route::post('/order/{order}/edit', [OrderController::class, 'put'])->middleware(['auth'])->name('orders.put');
Route::get('/order/{order}/delete', [OrderController::class, 'destroy'])->middleware(['auth'])->name('orders.destroy');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::post('/about-comment/create', [AboutCommentController::class, 'store'])->name('about-comment.store');
Route::get('/about-comment/edit/{comment}', [AboutCommentController::class, 'edit'])->name('about-comment.edit');
Route::post('/about-comment/edit/{comment}', [AboutCommentController::class, 'put'])->name('about-comment.put');
Route::get('/about-comment/delete/{comment}', [AboutCommentController::class, 'destroy'])->name('about-comment.destroy');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::post('/news/{news}/edit', [NewsController::class, 'put'])->name('news.put');
Route::get('/news/{news}/delete', [NewsController::class, 'destroy'])->name('news.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/admin/users', [UsersController::class, 'index'])->middleware('admin')->name('admin.users.index');
Route::get('/admin/users/{user}/edit', [UsersController::class, 'put'])->middleware('admin')->name('admin.users.put');

require __DIR__.'/auth.php';
