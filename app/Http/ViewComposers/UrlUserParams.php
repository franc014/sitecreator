<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/14/15
 * Time: 12:07 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\Support\Facades\Route;

trait UrlUserParams {

    public function userName(){
        $route = Route::current();
        $params = $route->parameters();
        return  $params['username'];
    }


}