<?php
namespace App\Repositories\Client;
use App\Profile;


/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 3:47 PM
 */

class ProfileRepository {


    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var Profile
     */
    private $model;

    function __construct(UserRepository $userRepository, Profile $model)
    {
        $this->userRepository = $userRepository;
        $this->model = $model;
    }

    public function getProfileByUserName($userName){
        $user = $this->userRepository->getUserByUserName($userName);
        $profile = $this->model->whereUser_id($user->id)->with("photo", "user","homecalls")->first();
        return $profile;
    }
}