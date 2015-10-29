<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 12:05 PM
 */

namespace App\Http\ViewComposers;


class CurrentRoute
{
    protected $route;

    public function getRouteParameter($parameter)
    {
        $params = $this->route->parameters();

        if (array_key_exists($parameter, $params)) {
            return $params[$parameter];
        }
        return "";
    }

    public function getRootPageName()
    {
        $uri = $this->route->uri();
        $separatedUri = explode('/', $uri);
        if (count($separatedUri) > 1) {
            if ($separatedUri[0] === $this->userName) {
                return $separatedUri[1];
            } else {
                return $separatedUri[0];
            }
        }
        return $separatedUri[0];
    }


}