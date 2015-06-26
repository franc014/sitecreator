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

/*Route::get('/emailtest',function(){
    Mail::send('emails.test',['client'=>"Juan Andrade"],function($message){
        $message->to("jfandradea@gmail.com")->subject("SITECREATOR EMAIL DE PRUEBA");
    });
});*/


Route::get('home', ['middleware'=>['auth'],'uses'=> 'HomeController@index']);
Route::get('/', ['as'=>'home','uses'=>'HomeController@index']);

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

Route::get('resume_drop_list','Admin\ResumeController@getResumeDropList');
Route::get('publishedresume','Admin\ResumeController@getPublishedResume');
Route::post('publish_resume/{id}','Admin\ResumeController@publishResume');
Route::post('clone_resume/{id}','Admin\ResumeController@cloneResume');
/*resources*/
Route::resource('bio','Admin\BiographyController');
Route::resource('profile','Admin\ProfileController');
Route::resource('user','Admin\UserController');
Route::resource('usercontenttype','Admin\UserContenttypeController');
Route::resource('saleable','Admin\SaleableController');
Route::resource('saleabledetail','Admin\SaleableDetailController');
Route::resource('saleableprice','Admin\SaleablePriceController');

Route::resource('resume','Admin\ResumeController');
Route::resource('experience','Admin\ExperienceController');
Route::resource('education','Admin\EducationController');
Route::resource('skill','Admin\SkillController');
Route::resource('language','Admin\LanguageController');
Route::resource('interest','Admin\ProfinterestController');
//get('/tepr','Admin\HomeController@profile');
//TODO contact admin implementation

/*user web client*/

//pages router
//home client
Route::get('{username}', 'Site\HomeController@index');
//page asked; e.g franc/contact
Route::get('{username}/{page}', 'Site\PagesController@index');
//display saleables
Route::get('{username}/productos_servicios/{saleable}/{saleable_id}', 'Site\SaleableController@index');
//store lead
Route::post('lead',"Site\GuestController@storeLead");


