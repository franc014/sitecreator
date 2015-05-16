<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/22/15
 * Time: 3:58 PM
 */

namespace App\Repositories\Client;


use App\Events\SendEmail;
use App\Lead;
use App\Repositories\DBRepository;
use App\Services\Mailers\ContactMailer;



class GuestRepository extends DBRepository{

    /**
     * @var Lead
     */
    protected $model;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    function __construct(Lead $model, UserRepository $userRepository)
    {
        $this->model = $model;
        $this->userRepository = $userRepository;
    }

    public function saveLead($dataPost){
        $user = $this->userRepository->getUserByUserName($dataPost["recipient"]);
        $data = [
            "user_id"=>$user->id,
            "status"=>$dataPost["status"],
            "names"=>$dataPost["names"],
            "email"=>$dataPost["email"],
            "phone"=>$dataPost["phone"],
            "cellular"=>$dataPost["cellular"],
            "inquiry"=>$dataPost["inquiry"]
        ];


        $this->saveModel($data);
        //send email
        $userFromContact = $this->getUserContact($data);
        $contactedUser = $this->getContactedUser($user);
        $data["contacted"] = $contactedUser;
        $emailData = [
            "data"=>$data,
            "userFrom"=>$userFromContact,
            "userTo"=>$contactedUser
        ];
        event(new SendEmail($this->emailData($emailData)));
        //dd(return);
    }


    public function emailData($data){
         $contactMailer = new ContactMailer(
            $data["data"],
            $data["userFrom"],
            $data["userTo"]
        );
        return $contactMailer;
    }

    public function getUserContact($data){
        return array_slice($data,2,3);
    }
    public function getContactedUser($data){
        return [
            "names"=>$data->names,
            "email"=>$data->email
        ];
    }


}