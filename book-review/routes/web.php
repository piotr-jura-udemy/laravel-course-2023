<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', controller: BookController::class)
    ->only(['index', 'show']);

Route::get('books/{book}/reviews/create', [ReviewController::class, 'create'])
    ->name('books.reviews.create');

Route::post('books/{book}/reviews', [ReviewController::class, 'store'])
    ->name('books.reviews.store')
    ->middleware('throttle:reviews');