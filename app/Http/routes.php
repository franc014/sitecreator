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


use Illuminate\Support\Facades\App;

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
Route::post('/profile/logo',['uses'=>'Admin\ProfileController@uploadLogo']);
Route::get('/profile/uploadedlogo',['uses'=>'Admin\ProfileController@getUploadedLogo']);
Route::post('admin/newpassword/{id}',['uses'=>'Admin\ChangePasswordController@updatePassword']);

Route::get('saleabledetail/{id}/icon','Admin\SaleableDetailController@getUploadedIcon');
Route::post('uploadSaleableDetailIcon','Admin\SaleableDetailController@uploadDescriptionIcon');

/*resources*/
Route::resource('bio','Admin\BiographyController');
Route::resource('profile','Admin\ProfileController');
Route::resource('user','Admin\UserController');
Route::resource('usercontenttype','Admin\UserContenttypeController');
Route::resource('saleable','Admin\SaleableController');
Route::resource('saleabledetail','Admin\SaleableDetailController');
Route::resource('saleableprice','Admin\SaleablePriceController');
//get('/tepr','Admin\HomeController@profile');
//TODO contact admin implementation


get('st',function(){
	//return view('layouts/prof/master');
	//$img = Image::make('foo.jpg')->resize(300, 200);

	//return $img->response('jpg');
});

