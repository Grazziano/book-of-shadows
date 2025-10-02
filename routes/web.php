<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrbanLegendsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/lendas-urbanas', [UrbanLegendsController::class, 'index'])->name('urban-legends');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas para o dashboard administrativo
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
