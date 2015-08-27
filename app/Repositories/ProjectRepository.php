<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Project;

class ProjectRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Project $model)
    {
        $this->model = $model;
    }

    function getAllByUserId($userId){
        $projects = $this->model->with('gallery_images')
            ->where('user_id',$userId)->get();
        return $projects;
    }
    public function getProjectImage($id){
        $project = $this->model->find($id);
        return $project->photo;
    }







}