<?php

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


Auth::routes();
Route::resource('/', App\Http\Controllers\PostsController::class);
Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');



//I used these routes for testing.
Route::get('/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/show/{slug}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
Route::get('/edit/{slug}', [App\Http\Controllers\PostsController::class, 'edit'])->name('edit');
Route::put('/update/{slug}', [App\Http\Controllers\PostsController::class, 'update'])->name('update');
Route::delete('/delete/{slug}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('delete');

#Manage Review
Route::post('/review-store',[App\Http\Controllers\PostsController::class, 'reviewstore'])->name('review.store');
