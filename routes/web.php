<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('api')->group(function () {
    Route::post('/web/books', [BookController::class, 'store']);
    Route::get('/web/books', [BookController::class, 'index']);
    Route::get('/web/books/{id}', [BookController::class, 'show']);
    Route::put('/web/books/{id}', [BookController::class, 'update']);
    Route::delete('/web/books/{id}', [BookController::class, 'destroy']);
});

