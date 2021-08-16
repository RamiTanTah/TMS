<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home','AdminController@home')->name('admin.home');



Route::get('/master', function () {
  return view('layouts.master');
});


Route::get('/app', function () {
  return view('layouts.app');
});

Route::get('/false', function () {
  return view('false');
});



Route::get('/nav', function () {
  return view('parts.sidebar');
});


Route::get('/1', function () {
  return view('starter');
});

