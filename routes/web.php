<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [PostController::class, 'form'])->name('form');
Route::post('/input', [App\Http\Controllers\PostController::class, 'input'])->name('input');
Route::get('/lihat', [PostController::class, 'lihat'])->name('lihat');
Route::get('/tampilinput{id}', [PostController::class, 'tampilinput'])->name('tampilinput');
Route::post('/update{id}', [PostController::class, 'update'])->name('update');
Route::get('/delete{id}', [PostController::class, 'delete'])->name('delete');
