<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/add', [NewsController::class, 'create'])->name('news.create');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/auth', function() {
    return view('auth.index');
})->name('auth.index');

