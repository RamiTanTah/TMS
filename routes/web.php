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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//  ### Redirect to login page 


// ### User Route
Route::group(['prefix' => 'user', 'namespace' => 'User'],function () {
  Route::get('profile/{id}', 'UserController@profile')->name('user.profile');
  
});



// test##################################################################################
Route::get('/test', 'TestController@testGet')->name('test.get');
Route::post('/test/{id}', 'TestController@testPost')->name('test.post');
Route::get('/testUsers', 'Workspace\WorkspaceController@getNewUsers')->name('test.get');

Route::get('/123', function () {
  return view('temp');
});


Route::get('/ttt', 'testController@test');
// Route::group(['prefix' => 'workspace', 'namespace' => 'User'],function () {
//   Route::get('{id}/profile', 'UserController@profile')->name('user.profile');

Route::get('/', function () {
  return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
// });
// test##################################################################################
