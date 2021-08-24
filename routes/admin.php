<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
// middleware Admin is used with all Routes in this file



Route::group(['prefix' => 'admin'] , function() {

// ### Admin route ###
    Route::get('home','AdminController@home')->name('admin.home');
    Route::get('/','AdminController@home')->name('admin.home');
    
// ### User routes ###
    Route::group(['namespace'=>'User','prefix'=>'user'], function(){
      Route::get('index','UserController@index')->name('user.index');
      Route::get('edit/{id}','UserController@edit')->name('user.edit');
      Route::put('update/{id}','UserController@update')->name('user.update');
      Route::delete('delete/{id}','UserController@result')->name('user.result');
      Route::get('search','UserController@search')->name('user.search');
      Route::get('result/{q}','UserController@result')->name('user.result');
      Route::get('destroy/{id}','UserController@destroy')->name('user.destroy');
      
  });

  ### workspace routes ###
    Route::group(['namespace'=>'Workspace','prefix'=>'workspace'], function(){
      Route::get('create','WorkspaceController@create')->name('workspace.create');
      Route::post('store','WorkspaceController@store')->name('workspace.store');
      Route::get('index','WorkspaceController@index')->name('workspace.index');


    });


    });

