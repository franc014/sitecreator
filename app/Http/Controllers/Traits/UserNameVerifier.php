<?php
namespace App\Http\Controllers\Traits;
use Illuminate\Support\Facades\Config;

/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 8/4/15
 * Time: 9:10 AM
 */

Trait UserNameVerifier {
    public function currentUserName($userName){

        if($userName==""){
            $defaultUser = Config::get("app_parametters.dedicatedUserName");
            if($defaultUser!=""){
                $user = $defaultUser;
            }else{
                abort(404);
            }
        }else{
            $user=$userName;
        }
        return $user;
    }
}