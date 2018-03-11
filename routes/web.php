<?php

Route::get('/', function () {
    return view('user.blog');
});

Route::get('post', function() {
    return view('user.post');
})->name('post');

Route::resource('admin/post', 'Admin\PostController');
Route::resource('admin/tag', 'Admin\TagController');
Route::resource('admin/category', 'Admin\CategoryController');

Route::get('admin/home', function() {
    return view('admin.home');
})->name('post');
