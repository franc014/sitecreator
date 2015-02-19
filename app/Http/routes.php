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
use Intervention\Image\Facades\Image;

Route::get('home', ['middleware'=>['auth'],'uses'=> 'HomeController@index']);
Route::get('/', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*Admin*/
Route::get('/admin/home',['middleware'=>['auth'],'uses'=>'Admin\HomeController@index']);
Route::get('/admin/{page}',['middleware'=>['auth'],'uses'=>'Admin\PagesController@index']);
Route::get('/admin/user',['middleware'=>['auth'],'uses'=>'Admin\HomeController@profile']);
Route::post('/biography/photo',['uses'=>'Admin\BiographyController@uploadPhoto']);
Route::get('/biography/uploadedphoto',['uses'=>'Admin\BiographyController@getUploadedPhoto']);

/*resources*/
Route::resource('bio','Admin\BiographyController');
Route::resource('user','Admin\UserController');
Route::resource('usercontenttype','Admin\UserContenttypeController');

//get('/tepr','Admin\HomeController@profile');
//TODO contact admin implementation


get('st',function(){
	//return view('layouts/prof/master');
	//$img = Image::make('foo.jpg')->resize(300, 200);

	//return $img->response('jpg');
});