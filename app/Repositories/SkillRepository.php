<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Skill;

class SkillRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Skill $model)
    {
        $this->model = $model;
    }

    public function saveSkill($data){
        $skill = $this->saveModel($data);
        return $dataResponse = [
            "skill"=>$skill,
            "meta"=>["result"=>"success","message"=>"La habilidad fue creado exitosamente"]
        ];
    }

    public function updateSkill($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "skill"=>$result,
            "meta"=>["result"=>"success","message"=>"La habilidad ha sido actualizada exitosamente"]
        ];
    }


}