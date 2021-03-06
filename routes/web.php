<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

//File
Route::get('/file/create', function(){
    Storage::put('marvel.txt','Ironman');
});

Route::get('/file/read', function(){
    return Storage::get('marvel.txt');
});

Route::get('/file/delete', function(){
    Storage::delete('marvel.txt');
});

//User
Route::get('/register',[RegisterController::class,'create'] )->name('register.create');
Route::post('/register',[RegisterController::class,'store'] )->name('register.store');

Route::get('/login',[LoginController::class,'create'])->name('login.create');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::delete('/logout',[LoginController::class,'destroy'])->name('logout');


//Page
Route::view('/','index')->name('home');

//Profile
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/update',[ProfileController::class,'update'])->name('profile.update');

//MyPosts
Route::get('/my-posts',[MyPostController::class,'index'])->name('my-posts.index');


//Posts
Route::get('/posts',[PostController::class,'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class,'create'])->middleware('myauth')->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');

Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
Route::post('/posts/update/{id}',[PostController::class,'update'])->name('posts.update');

Route::get('/posts/show/{id}',[PostController::class,'show'])->name('posts.show');
Route::delete('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.delete');


//Categories
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');

Route::get('/categories/create',[CategoryController::class,'create'])->middleware('myauth')->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');

Route::get('/categories/show/{id}',[CategoryController::class,'show'])->name('categories.show');
Route::delete('/categories/delete/{id}',[CategoryController::class,'destroy'] )->name('categories.delete');


