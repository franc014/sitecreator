<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/23/15
 * Time: 7:15 PM
 */

namespace App\Services\Mailers;


use Illuminate\Support\Facades\Config;

class ContactMailer extends GlobalMailer implements Mailer{

    private $subject;
    /**
     * @var
     */
    private $view;
    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $userFrom;
    /**
     * @var
     */
    private $userTo;


    function __construct($data,$userFrom,$userTo)
    {
        $this->subject = Config::get("mail_parametters.guest_contacts_user_subject");
        $this->view = Config::get("mail_parametters.guest_contacts_user_view");
        //dd(Config::get("directories.prefix.logo"));
        $this->data = $data;
        //dd($this->data);
        $this->userFrom = $userFrom;
        $this->userTo = $userTo;
    }

    public function send(){
        $this->sendTo($this->view,$this->data,$this->userFrom,$this->userTo,$this->subject);
    }


}