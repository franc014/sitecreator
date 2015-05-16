<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/19/15
 * Time: 5:21 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository {

    /**
     * @var User
     */
    protected $model;

    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function singleUserApiEntry($userId){
        $user = $this->model->where('id',$userId)->get();
        $data = ["users"=>$user,
            "meta"=>["message"=>"Ok"]
        ];
        return $data;
    }

    public function findByUserId($userId){
        $user = $this->model->find($userId);
        return $user;
    }

    public function updateUser($id, $data){
        $user = $this->findByUserId($id);
        $user->update($data);
        $dataResponse = [
            "profile"=>$user,
            "meta"=>["result"=>"success","message"=>"Los datos han sido actualizados exitosamente"]
        ];
        return $dataResponse;
    }






}