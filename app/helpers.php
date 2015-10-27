<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


function user()
{
    //$user = Session::get('user');
    $user = Auth::user();
    return $user;
}

function loggedUserNames()
{
    $user = user();
    $username = $user->username;
    $firstName = $user->profile->firstname;
    $lastName = $user->profile->lastname;
    if ($firstName == "") {
        return $username;
    }

    return $firstName . " " . $lastName;
}

function loggedUserPhoto()
{
    $user = user();
    //dd($user->photo());
    //$userEmail = $user->email;
    return $user->gravatar;//Config::get('directories.user_photos')."juan.jpeg";
}

function getRandomHexadecimalColor()
{
    $color = substr(md5(rand()), 0, 6);
    return '#' . $color;
}

