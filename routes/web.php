<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function () {
    
    //List of routes for category module
    Route::get('/category', 'CategoriesController@index')->name('category.index');

   Route::get('/category/create', 'CategoriesController@create')->name('category.create');

   Route::post('/category', 'CategoriesController@store')->name('category.store');
   
   Route::get('/category/{id}/edit', 'CategoriesController@edit')->name('category.edit');

   Route::put('/category/{id}', 'CategoriesController@update')->name('category.update');

   Route::delete('/category/{id}', 'CategoriesController@delete')->name('category.delete');
   // fin route category


   //Routes for Posts Module
   Route::resource('/post', 'PostsController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
