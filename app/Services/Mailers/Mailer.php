<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/23/15
 * Time: 6:45 PM
 */
namespace App\Services\Mailers;

interface  Mailer {
    public function send();
}