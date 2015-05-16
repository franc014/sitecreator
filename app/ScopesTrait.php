<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 7:14 PM
 */

namespace App;


trait ScopesTrait {
    public function scopeUserId($query, $userId){
        return $query->where("user_id",$userId);
    }
}