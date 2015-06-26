<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;


use App\Education;

class EducationRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Education $model)
    {
        $this->model = $model;
    }

    public function saveEducation($data){
        $experience = $this->saveModel($data);
        return $dataResponse = [
            "education"=>$experience,
            "meta"=>["result"=>"success","message"=>"El estudio fue creado exitosamente"]
        ];
    }

    public function updateEducation($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "education"=>$result,
            "meta"=>["result"=>"success","message"=>"El estudio ha sido actualizado exitosamente"]
        ];
    }


}