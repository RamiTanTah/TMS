<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/




Route::group(['prefix' => 'admin'] , function() {

// ### Admin route ###
    Route::get('home','AdminController@home')->name('admin.home');
    Route::get('/','AdminController@home')->name('admin.home');
    
// ### User routes ###

    Route::group(['namespace'=>'User','prefix'=>'user'], function(){
      Route::get('show/all','UserController@index')->name('user.index');
      Route::get('edit/{id}','UserController@edit')->name('user.edit');
      Route::put('update/{id}','UserController@update')->name('user.update');
      Route::get('delete/{id}','UserController@result')->name('user.result');
      Route::get('search','UserController@search')->name('user.search');
      Route::get('result/{q}','UserController@result')->name('user.result');
      Route::get('destroy/{id}','UserController@destroy')->name('user.destroy');
      
  });

  Route::resource('tototo', UserController::class);

    });

