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


Route::namespace('site')->group(function(){
    Route::get('/', 'SiteController@index')->name('site.index');
    Route::get('/blog', 'SiteController@blog')->name('site.blog');
    Route::get('/contact', 'SiteController@contact')->name('site.contact');
    Route::get('/{id}', 'SiteController@show')->name('site.show');
    Route::post('/contact', 'SiteController@storeContact')->name('contact.store');
});



Route::middleware('auth')->prefix('admin')->namespace('Admin')->group(function () {
    
    //List of routes for category module
    Route::get('/category', 'CategoriesController@index')->name('category.index');

   Route::get('/category/create', 'CategoriesController@create')->name('category.create');

   Route::post('/category', 'CategoriesController@store')->name('category.store');
   
   Route::get('/category/{id}/edit', 'CategoriesController@edit')->name('category.edit');

   Route::put('/category/{id}', 'CategoriesController@update')->name('category.update');

   Route::delete('/category/{id}', 'CategoriesController@delete')
       ->middleware('admin')
       ->name('category.delete');
   // fin route category


   //Routes for Posts Module
   Route::resource('/post', 'PostsController');

   Route::get('/post/list/trashed', 'PostsController@trashed')
         ->middleware('admin')
         ->name('post.trashed');

   Route::post('/post/restore/{id}', 'PostsController@restore')
         ->middleware('admin')
         ->name('post.restore');

   //Routes for User
   Route::resource('user', 'UsersController');

   Route::put('user/change/permission/{id}', 'UsersController@changePermission')
        ->name('user.change.permission')
        ->middleware('admin');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
