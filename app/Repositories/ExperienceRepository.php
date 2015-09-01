<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/8/15
 * Time: 11:36 AM
 */

namespace App\Repositories;


use App\Experience;
use App\Services\DateTime\DateHelper;
use Carbon\Carbon;

class ExperienceRepository extends DBRepository{

    /**
     * @var Experience
     */
    protected $model;

    function __construct(Experience $model)
    {
        $this->model = $model;
    }

    public function saveExperience($data){

        $data['endtimestamp']=DateHelper::getUnixTimeStamp('spanish',$data['endyear'],$data['endmonth']);
        $experience = $this->saveModel($data);
        return $dataResponse = [
            "experience"=>$experience,
            "meta"=>["result"=>"success","message"=>"La Experiencia fue creada exitosamente"]
        ];
    }

    public function updateExperience($id,$data){

        $data['endtimestamp']=DateHelper::getUnixTimeStamp('spanish',$data['eyear'],$data['emonth']);
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "experience"=>$result,
            "meta"=>["result"=>"success","message"=>"La experiencia ha sido actualizada exitosamente"]
        ];
    }



}