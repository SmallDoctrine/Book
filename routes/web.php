<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\HomeController::class)->name('table.')->group(function (){
    Route::get('/','index')->name('Home');
});

Route::controller(\App\Http\Controllers\BooksController::class)->prefix('books')->name('books.')->group(function(){
    Route::get('/','index')->name('homepage');
    Route::get('create','create')->name('create');
    Route::post('create-store','createStore')->name('store');
    Route::get('update/{name}','update');
    Route::get('updateStore/{name}','updateStore');
    Route::get('destroy/{name}','destroy');
    Route::get('show/{name}','show')->name('show');
});

Route::controller(\App\Http\Controllers\NewsController::class)->prefix('News')->name('News.')->group(function (){
    Route::get('/','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('CreateStore','createStore')->name('CreateStore');
    Route::get('show/{slug}','show')->name('show');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout',[\App\Http\Controllers\auth\LoginController::class,'logout'])->name('logout');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard' ,[\App\Http\Controllers\user\UserController::class ,'index'])->name('dashboard');
    });

});

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function(){
        Route::get('/',[\App\Http\Controllers\auth\LoginController::class,'index'])->name('login');
        Route::post('/',[\App\Http\Controllers\auth\LoginController::class,'authenticate'])->name('authenticate');
    });
    Route::get('/register',[\App\Http\Controllers\auth\AuthController::class,'create'])->name('create');
    Route::post('/register/store',[\App\Http\Controllers\auth\AuthController::class,'createStore'])->name('createStore');
});




