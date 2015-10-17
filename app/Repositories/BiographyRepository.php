<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 7/2/15
 * Time: 3:06 PM
 */

namespace App\Repositories;


use App\Biography;
use App\Repositories\Client\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;

class BiographyRepository extends DBRepository{


    /**
     * @var Biography
     */
    protected $model;
    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(Biography $model, UserRepository $userRepository)
    {

        $this->model = $model;
        $this->userRepository = $userRepository;
    }

    public function saveBio($data){
        $bio = $this->saveModel($data);
        //check if no bios
        $bios = $this->model->where("user_id",$data["user_id"])
            ->where("id","<>",$bio->id)->get();
            //dd($bios->isEmpty());
            //no bios: update default = 1
            if($bios->isEmpty()){
                $bio->default = 1;
                $bio->save();
            }
        return $dataResponse = [
            "bio"=>$bio,
            "meta"=>["result"=>"success","message"=>"La biografía fue creada exitosamente"]
        ];
    }

    public function updateBio($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "bio"=>$result,
            "meta"=>["result"=>"success","message"=>"La biografía ha sido actualizada exitosamente"]
        ];
    }
    public function deleteBio($id) {
        $bio = $this->model->find($id);
        $bios = $this->model->where("id","<>",$id)->get();
        if($bio->default==1 ){
            if(!$bios->isEmpty()){
                $otherBio = $this->model->where("id","<>",$id)->firstOrFail();
                try{
                    $otherBio->default = 1;
                    $otherBio->save();
                }catch (ModelNotFoundException $nf){
                    //abort(404);
                }
            }else{
                //dd("empty");
                return $this->remove($id);
            }

        }
        return $this->remove($id);
    }

    public function getBioDropList($user_id){
        $bios = $this->model->where('user_id',$user_id)->where("status",1)->lists('title','id');
        return $bios;
    }

    public function setAsDefault($userId,$bioId){
        //select default bio
        $defaultBio = $this->getDefaultBio($userId);
        $defaultBio->default = 0;
        $defaultBio->save();

        $data = ["default" => 1];
        return $this->updateBio($bioId,$data);
    }

    public function getDefaultBio($userId){
        return $this->model->where("user_id",$userId)->where("default",1)->firstOrFail();
    }

    public function getDefaultBioByUserName($userName){
        try {
            $user = $this->userRepository->getUserByUserName($userName);
            return $this->model->where("user_id", $user->id)->where("status", 1)->where("default", 1)->firstOrFail();
        }catch (ModelNotFoundException $exception){
             return null;
        }
    }



}