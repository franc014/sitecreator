<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 12:05 PM
 */

namespace App\Http\ViewComposers;




class CurrentRoute {
    protected $route;

    public function getRouteParameter($parameter){
        $params = $this->route->parameters();
        return  $params[$parameter];
    }


}