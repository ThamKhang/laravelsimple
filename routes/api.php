<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'create']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
