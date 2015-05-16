<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 4:00 PM
 */
namespace App\Repositories\Client;

use App\User;

class UserRepository {

    /**
     * @var User
     */
    private $model;

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserByUserName($userName){
        $user = $this->model->whereUsername($userName)->firstOrFail();
        return $user;
    }
}