<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 7/2/15
 * Time: 3:06 PM
 */

namespace App\Repositories;


use App\Biography;

class BiographyRepository extends DBRepository{


    /**
     * @var Biography
     */
    protected $model;

    function __construct(Biography $model)
    {

        $this->model = $model;
    }

    public function saveBio($data){
        $bio = $this->saveModel($data);
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

    public function getBioDropList($user_id){
        $bios = $this->model->where('user_id',$user_id)->where("status",1)->lists('title','id');
        return $bios;
    }

}