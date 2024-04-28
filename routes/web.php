<?php

use Illuminate\Support\Facades\Route;
Route::controller(\App\Http\Controllers\HomeController::class)->name('table.')->group(function (){
    Route::get('/','index')->name('Home');
});



Route::controller(\App\Http\Controllers\BooksController::class)->prefix('books')->name('books.')->group(function(){
    Route::get('/','index')->name('homepage');
    Route::get('create','create')->name('create');
    Route::post('createStore','createStore');
    Route::get('update/{id}','update');
    Route::get('updateStore/{id}','updateStore');
    Route::get('destroy/{id}','destroy');
    Route::get('show/{id}','show')->name('show');
});

Route::controller(\App\Http\Controllers\NewsController::class)->prefix('News')->name('News.')->group(function (){
    Route::get('/','index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('CreateStore','createStore')->name('CreateStore');
    Route::get('show/{slug}','show')->name('show');



});

