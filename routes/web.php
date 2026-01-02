<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);

// auth
// register
Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// blog posts resource
Route::middleware('auth')->group(
    function () {

        // Admin
        Route::middleware('role:admin')->group(
            function () {
                Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
                Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
                Route::delete('/blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');
            }
        );
        // Viewer, Editor, Admin
        Route::middleware('role:viewer,editor,admin')->group(
            function () {
                Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
                Route::get('/blog/{id}', [PostController::class, 'show'])->name('blog.show');
            }
        );

        // Editor, Admin
        Route::middleware('role:editor,admin')->group(function () {
            Route::get('/blog/{id}/edit', [PostController::class, 'edit'])->name('blog.edit');
            Route::put('/blog/{id}', [PostController::class, 'update'])->name('blog.update');
        });

        Route::get('/blog/create-with-tag/{post_id}/{tag_id}', [PostController::class, 'attachTag']);

        // comments resource
        Route::resource('comments', CommentController::class);
    }
);
