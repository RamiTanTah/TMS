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
    
// ### User routes ###
  //   Route::group(['namespace' => 'User'], function(){
  //     Route::resource('user', UserController::class);
  // });

    });

