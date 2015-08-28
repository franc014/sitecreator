<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;


use App\Education;
use App\Services\DateTime\DateHelper;

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
        $data['endtimestamp']=DateHelper::getUnixTimeStamp('spanish',$data['endyear'],$data['endmonth']);
        $education = $this->saveModel($data);
        return $dataResponse = [
            "education"=>$education,
            "meta"=>["result"=>"success","message"=>"El estudio fue creado exitosamente"]
        ];
    }

    public function updateEducation($id,$data){
        $data['endtimestamp']=DateHelper::getUnixTimeStamp('spanish',$data['endyear'],$data['endmonth']);
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "education"=>$result,
            "meta"=>["result"=>"success","message"=>"El estudio ha sido actualizado exitosamente"]
        ];
    }


}