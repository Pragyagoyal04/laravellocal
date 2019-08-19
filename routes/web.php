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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/intervention/resizeImage', 'AdminController@getResizeImage')->name('intervention_getresizeimage');
Route::post('/intervention/resizeImage', 'AdminController@postResizeImage')->name('intervention_postresizeimage');

//global variable in laravel
//define('THUMBS_DIR','thumbs');
Route::get('/admin/home',function()
{
  if (Gate::allows('admin-only', Auth::user()->id=='1')) {
   echo'hello';
   return view('admin_welcome');
}
else
{
   return 'you are not authorised';
}
});