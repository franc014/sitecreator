<?php
namespace App\Repositories;
use App\Profile;
use Illuminate\Auth\Guard;

class ProfileRepository {
    /**
     * @var Profile
     */
    protected $model;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(Profile $model, Guard $auth)
    {
        $this->model = $model;
        $this->auth = $auth;
    }





}