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
/*Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});*/

use App\User;


Route::get('home', ['middleware' => ['auth'], 'uses' => 'HomeController@index']);

/*user web client*/

if(Config::get("app_parametters.isDedicated")){

    Route::get("/verApi",function(){
        $users = User::all();
        return Response::json($users,200);
    });

    Route::get('/', 'Site\HomeController@index');
    Route::get('home', 'Site\HomeController@home');
    Route::get('acercade', 'Site\BioController@index');

    Route::get('user_resume', 'Site\ResumeController@index');
    Route::get('contacto', 'Site\PagesController@contacto');

    Route::get('productos-y-servicios', 'Site\SaleableController@index');
    //Route::get('servicios', 'Site\SaleableController@index');
    Route::get('producto/{saleable}', 'Site\SaleableController@detail');
    Route::get('servicio/{saleable}', 'Site\SaleableController@detail');

    Route::get('portafolio', 'Site\PortfolioController@index');
    Route::get('project/{projectname}', 'Site\PortfolioController@detail');

}else{

    Route::get('{username}', 'Site\HomeController@index');
    Route::get('{username}/acercade', 'Site\BioController@index');

    Route::get('{username}/user_resume', 'Site\ResumeController@index');
    Route::get('{username}/contacto/', 'Site\PagesController@contacto');


    Route::get('{username}/productos_servicios', 'Site\SaleableController@index');
    Route::get('{username}/productos_servicios/{saleable}/{saleable_id}', 'Site\SaleableController@detail');

    Route::get('{username}/portafolio', 'Site\PortfolioController@index');
    Route::get('{username}/project/{projectname}', 'Site\PortfolioController@detail');

}
Route::post('lead', 'Site\GuestController@storeLead');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);


    /*Admin*/
    Route::get('/admin/home', ['middleware' => ['auth'], 'uses' => 'Admin\HomeController@index']);
    Route::get('/admin/{page}', ['middleware' => ['auth'], 'uses' => 'Admin\PagesController@index']);
    Route::get('/admin/user', ['middleware' => ['auth'], 'uses' => 'Admin\HomeController@profile']);
    Route::post('/biography/photo', ['uses' => 'Admin\BiographyController@uploadPhoto']);
    Route::get('/biography/uploadedphoto', ['uses' => 'Admin\BiographyController@getUploadedPhoto']);
    Route::post('/profile/logo', ['uses' => 'Admin\ProfileController@uploadLogo']);
    Route::get('/profile/uploadedlogo', ['uses' => 'Admin\ProfileController@getUploadedLogo']);
    Route::post('admin/newpassword/{id}', ['uses' => 'Admin\ChangePasswordController@updatePassword']);

    Route::get('saleabledetail/{id}/icon', 'Admin\SaleableDetailController@getUploadedIcon');
    Route::post('uploadSaleableDetailIcon', 'Admin\SaleableDetailController@uploadDescriptionIcon');
    Route::post('uploadProjectFeatureImage', 'Admin\ProjectController@uploadProjectFeatureImage');
    Route::post('uploadProjectGalleryImage', 'Admin\ProjectController@uploadProjectImageGallery');
    Route::get('projectimage/{id}', 'Admin\ProjectController@getUploadedProjectImage');
    Route::post('uploadHomeImage', 'Admin\HomepageController@uploadHomeImage');
    Route::get('homeimage/{id}', 'Admin\HomepageController@getUploadedHomeImage');

    //categorization
    Route::get('salcatlist','Admin\SaleableController@listAllCategories');
    Route::get('salcatlistselected/{id}','Admin\SaleableController@listModelCategories');
    Route::get('projectcatlist','Admin\ProjectController@listAllCategories');
    Route::get('projectcatlistselected/{id}','Admin\ProjectController@listModelCategories');


    Route::post('/biography/setDefault/{id}', 'Admin\BiographyController@setDefault');
    Route::get('bio_drop_list', 'Admin\BiographyController@getBioDropList');
    Route::get('resume_drop_list', 'Admin\ResumeController@getResumeDropList');
    Route::get('publishedresume', 'Admin\ResumeController@getPublishedResume');
    Route::post('publish_resume/{id}', 'Admin\ResumeController@publishResume');
    Route::post('default_resume/{id}', 'Admin\ResumeController@setAsDefault');
    Route::post('clone_resume/{id}', 'Admin\ResumeController@cloneResume');

    /*resources*/

    Route::resource('bio', 'Admin\BiographyController');
    Route::resource('profile', 'Admin\ProfileController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('usercontenttype', 'Admin\UserContenttypeController');
    Route::resource('saleable', 'Admin\SaleableController');
    Route::resource('saleabledetail', 'Admin\SaleableDetailController');
    Route::resource('saleableprice', 'Admin\SaleablePriceController');
    Route::resource('project', 'Admin\ProjectController');
    Route::resource('galimage', 'Admin\GalleryController');

    Route::resource('resume', 'Admin\ResumeController');
    Route::resource('experience', 'Admin\ExperienceController');
    Route::resource('education', 'Admin\EducationController');
    Route::resource('skill', 'Admin\SkillController');
    Route::resource('language', 'Admin\LanguageController');
    Route::resource('interest', 'Admin\ProfinterestController');

/*configuration*/
    Route::resource('cat', 'Admin\CategoryController');

//TODO contact admin implementation
/*home page config:callouts*/
    Route::get('activecontent', 'Admin\HomepageController@getActiveContent');
    Route::resource('homecallout', 'Admin\HomepageController');





