<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/create', [PostController::class, 'create']);
Route::get('blog/delete/{id}', [PostController::class, 'delete']);
Route::get('/blog/{id}', [PostController::class, 'show']);

//comments
Route::get('comments', [CommentController::class, 'index']);
Route::get('comments/{id}', [CommentController::class, 'show']);