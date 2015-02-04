<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
/*home and authentication*/
Route::get('home', ['middleware'=>['auth'],'uses'=> 'HomeController@index']);
Route::get('/', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*Admin*/
Route::get('/admin/home',['middleware'=>['auth'],'uses'=>'Admin\HomeController@index']);
Route::get('/admin/user',['middleware'=>['auth'],'uses'=>'Admin\HomeController@profile']);


//get('/tepr','Admin\HomeController@profile');
