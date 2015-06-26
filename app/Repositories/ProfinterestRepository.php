<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Profinterest;

class ProfinterestRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Profinterest $model)
    {
        $this->model = $model;
    }

    public function saveInterest($data){
        $interest = $this->saveModel($data);
        return $dataResponse = [
            "interest"=>$interest,
            "meta"=>["result"=>"success","message"=>"El interés profesional fue creado exitosamente"]
        ];
    }

    public function updateInterest($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "interest"=>$result,
            "meta"=>["result"=>"success","message"=>"El interés profesional ha sido actualizado exitosamente"]
        ];
    }


}