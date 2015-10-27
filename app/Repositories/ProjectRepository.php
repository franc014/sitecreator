<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Project;
use App\Repositories\Client\UserRepository;

class ProjectRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    function __construct(Project $model,UserRepository $userRepository,CategoryRepository $categoryRepository)
    {
        $this->model = $model;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
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

    public function getAllByUserName($userName){
        $user = $this->userRepository->getUserByUserName($userName);
        //TODO: Pagination on portfolio
        $portfolio = $this->model->where('user_id',$user->id)->where('status',1)->get();
        return $portfolio;
    }
    public function getAllByUserNameExcept($userName,$exceptProjectId){
        $user = $this->userRepository->getUserByUserName($userName);
        //TODO: Pagination on portfolio
        $portfolio = $this->model->where('user_id',$user->id)->where('status',1)->where('id','<>',$exceptProjectId)->get();
        return $portfolio;
    }
    public function getProjectByName($projectName){
        $projectTitle =  str_replace('-',' ',$projectName);
        $project = $this->model->where('title',$projectTitle)->with('gallery_images','categories')->firstOrFail();
        return $project;
    }











}