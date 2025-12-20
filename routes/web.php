<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);
// blog posts resource
Route::resource('blog', PostController::class);
Route::get('/blog/create-with-tag/{post_id}/{tag_id}', [PostController::class, 'attachTag']);

// comments resource
Route::resource('comments', CommentController::class);
