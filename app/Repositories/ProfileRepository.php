<?php
namespace App\Repositories;
use App\Profile;
use Illuminate\Auth\Guard;

class ProfileRepository {
    /**
     * @var Profile
     */
    protected $model;

    function __construct(Profile $model)
    {
        $this->model = $model;

    }
    public function findByUserId($userId){
        $profile = $this->model->where('user_id',$userId)->first();
        return $profile;
    }
    public function getBioPhoto($userId){
        $profile = $this->findByUserId($userId);
        return $profile->photo;
    }
    public function allProfiles($userId){
        //api resource call /profile
        $profiles =  $this->model->where('user_id',$userId)->get();
        //$data = ["profiles"=>$profiles,"meta"=>["message"=>"Ok"]];
        return $profiles;
    }

    public function updateProfileByUserId($userId,$data){
        $profile = $this->findByUserId($userId);
        $profile->update($data);
        $dataResponse = [
            "profile"=>$profile,
            "meta"=>["result"=>"success","message"=>"El perfil ha sido actualizado exitosamente"]
        ];
        return $dataResponse;
    }

    public function create($userId){

        $data = [
        "user_id"=>$userId,
        "firstname"=>"",
        "lastname"=>"",
        "title"=>"",
        "biography"=>""
        ];
        $this->model->create($data);
    }

    public function getLogo($userId){
        $profile = $this->findByUserId($userId);
        return $profile->logo;
    }





}