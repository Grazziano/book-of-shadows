<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrbanLegendsController;
use App\Http\Controllers\HorrorStoriesController;
use App\Http\Controllers\CreateLegendController;
use App\Http\Controllers\MacabreNewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/lendas-urbanas', [UrbanLegendsController::class, 'index'])->name('urban-legends');
Route::get('/lendas-urbanas/{id}', [UrbanLegendsController::class, 'show'])->name('urban-legends.show');

Route::get('/contos-de-terror', [HorrorStoriesController::class, 'index'])->name('horror-stories');
Route::get('/contos-de-terror/{id}', [HorrorStoriesController::class, 'show'])->name('horror-stories.show');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/crie-sua-lenda', [CreateLegendController::class, 'create'])->name('create-legend');
Route::post('/crie-sua-lenda', [CreateLegendController::class, 'store'])->name('store-legend');

Route::get('/boletim-macabro', [MacabreNewsletterController::class, 'index'])->name('macabre-newsletter');

// Rotas para reviews (dicas e avaliações)
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/filmes', [ReviewController::class, 'byType'])->defaults('type', 'movie')->name('reviews.movies');
Route::get('/livros', [ReviewController::class, 'byType'])->defaults('type', 'book')->name('reviews.books');
Route::get('/series', [ReviewController::class, 'byType'])->defaults('type', 'series')->name('reviews.series');

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
