<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/1/15
 * Time: 4:30 PM
 */

namespace App\Repositories;


use App\Resumesection;
use App\Userresumesection;

class ResumeSectionRepository {


    /**
     * @var Resumesection
     */
    private $resumesection;
    /**
     * @var Userresumesection
     */
    protected $model;

    function __construct(Resumesection $resumesection,Userresumesection $model )
    {

        $this->resumesection = $resumesection;
        $this->model = $model;
    }

    public function createUserSections($user_id, $resume_id){
        $sections = $this->resumesection->all();

        foreach($sections as $section){

            $data = [
                "user_id"=>$user_id,
                "resume_id"=>$resume_id,
                "resumesection_id"=>$section->id,
                "alias"=>$section->name
            ];
            $this->model->create($data);
        }
        //TODO: check saving and return errors if something wrong with db
    }
}
