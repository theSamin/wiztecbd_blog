<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Blog All Routes
Route::controller(BlogController::class)->group(function () {
    Route::get('/', 'Blog')->name('blog');
    Route::post('/', 'Blog')->name('blog.search');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
});

Route::controller(CommentController::class)->group(function () {
    Route::post("blog/details/store/comment", "StoreComment")->name("store.comment");
});
