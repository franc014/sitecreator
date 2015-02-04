<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


function user(){
    //$user = Session::get('user');
    $user = Auth::user();
    return $user;
}

function loggedUserNames(){
    $user = user();
    $firstName = $user->username;
    $lastName = "";
    if($user->hasprofile) {
        $firstName = $user->profile->first_name;
        $lastName = $user->profile->last_name;
    }
    return $firstName." ".$lastName;
}

function loggedUserPhoto(){
    $user = user();
    //dd($user->photo());
    //$userEmail = $user->email;
    return $user->gravatar;//Config::get('directories.user_photos')."juan.jpeg";
}

