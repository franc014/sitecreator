<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/23/15
 * Time: 7:38 PM
 */

namespace App\Services\Mailers;


use Illuminate\Support\Facades\Mail;

abstract class GlobalMailer {
    protected function sendTo($view,$data,$userFrom,$userTo,$subject){
        //dd($data);
        Mail::queue($view, $data, function($message) use($userFrom,$userTo,$subject)
        {
            $message->from($userFrom["email"], $userFrom["names"]);
            $message->to($userTo["email"], $userTo["names"])->subject($subject);
        });
    }
}