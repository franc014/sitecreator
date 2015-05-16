<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 12:03 PM
 */

namespace App\Http\ViewComposers;
use Illuminate\Support\Facades\Route;

trait UrlSaleableParams {
    public function userName(){
        $route = Route::current();
        $params = $route->parameters();
        return  $params[''];
    }
}