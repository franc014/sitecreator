<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/2/15
 * Time: 10:49 AM
 */

namespace App\Repositories;


use App\Repositories\Client\UserRepository;
use App\Resume;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ResumeRepository extends DBRepository{

    /**
     * @var Resume
     */
    protected $model;
    /**
     * @var ResumeSectionRepository
     */
    private $resumeSectionRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(Resume $model, ResumeSectionRepository $resumeSectionRepository, UserRepository $userRepository)
    {
        $this->model = $model;
        $this->resumeSectionRepository = $resumeSectionRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllByUserId($userId){
        $resumes = $this->model->with('biography')->where("user_id",$userId)->get();
        return $resumes;
    }

    public function getResumeDropList($user_id){
        $resumes = $this->model->where('user_id',$user_id)->lists('name','id');
        return $resumes;
    }

    public function getPublishedResume($user_id){
        $resume = $this->model->with('biography')->where("user_id",$user_id)->where("default",1)->firstOrFail();
        return $resume;
    }

    public function getDefaultResume($user_id){
        $resume = $this->model->where("user_id",$user_id)->firstOrFail();
        try{
            return $this->getPublishedResume($user_id);
        }catch (ModelNotFoundException $mnfe){
            $mnfe->getMessage();
        }
        return $resume;
    }

    public function getResume($user_id,$id){
        $resume = $this->model->with('biography')->where("user_id",$user_id)->where("id",$id)->firstOrFail();
        return $resume;
    }

    public function isThereADefault($user_id){
        $defaultResumes = $this->model->where("user_id",$user_id)->where("default",1)->get();
        if($defaultResumes->count()==0){
            return false;
        }
        return true;
    }


    public function saveResume($user_id,$data){
        $countResumes = $this->getAllByUserId($user_id)->count();
        $resume = $this->saveModel($data);
        if($resume!=null){
            $this->resumeSectionRepository->createUserSections($user_id,$resume->id);
        }
        if($countResumes==0 ) {
            $resume->default = 1;
            $resume->save();
        }

        return $dataResponse = [
            "resume"=>$resume,
            "meta"=>["result"=>"success","message"=>"El résumé ha sido creado exitosamente"]
        ];
    }

    public function updateResume($id,$data){
        //$firstResume = $this->model->where("user_id",$data["user_id"])->firstOrFail();
        $result = $this->updateModel($id,$data);
        //dd($this->isThereADefault($data["user_id"]));

        return $dataResponse = [
            "resume"=>$result,
            "meta"=>["result"=>"success","message"=>"El résumé ha sido actualizado exitosamente"]
        ];
    }

    public function setAsDefault($user_id,$otherResumeId){
        $firstResume = $this->model->where("user_id",$user_id)->where("id","<>",$otherResumeId)->firstOrFail();
        $firstResume->active = 1;
        $firstResume->save();
    }

    public function removeResume($user_id,$id){
        /*$resume = $this->getResume($user_id,$id);
        if($resume->active==1 && $this->numberOfResumes()>=1){
            $this->setAsDefault($user_id,$id);
        }*/
        return $this->remove($id);
    }

    public function numberOfResumes(){
        return $this->model->all()->count();
    }

    public function publishResume($id){
        //$this->unpublishActiveResumes();
        $resume = $this->model->find($id);
        $resume->active = 1;
        $resume->save();

        return $dataResponse = [
            "resume"=>$resume,
            "meta"=>["result"=>"success","message"=>"El résumé ha sido publicado exitosamente"]
        ];

    }

    public function defaultResume($id){
        $this->removeDefaultResumes();
        $resume = $this->model->find($id);
        $resume->default = 1;
        $resume->save();

        return $dataResponse = [
            "resume"=>$resume,
            "meta"=>["result"=>"success","message"=>"El résumé ha sido definido como predeterminado"]
        ];

    }



    /*private function unpublishActiveResumes()
    {
        $activeResumes = $this->model->where("active",1)->get();
        if($activeResumes->count()>=1){
            foreach($activeResumes as $resume){
                $resume->active = 0;
                $resume->save();
            }
        }
    }*/

    private function removeDefaultResumes()
    {
        $defaultResumes = $this->model->where("default",1)->get();
        if($defaultResumes->count()>=1){
            foreach($defaultResumes as $resume){
                $resume->default = 0;
                $resume->save();
            }
        }
    }

    public function cloneResume($resume_id){
        $resume = $this->model->whereId($resume_id)->firstOrFail();
        $newResume = $resume->cloneModel();
        $children = [
            $resume->experiences,
            $resume->educations,
            $resume->skills,
            $resume->languages,
            $resume->interests
        ];
        $this->cloneChildren($children,$newResume);
        return $dataResponse = [
            "resume"=>$newResume,
            "meta"=>["result"=>"success","message"=>"El résumé ha sido clonado exitosamente"]
        ];

    }

    /**
     * @param $children
     * @param $newResume

     */
    public function cloneChildren($children,$newResume)
    {
        foreach($children as $child){
            $this->iterateCloning($child, $newResume);
        }
    }

    /**
     * @param $collections
     * @param $newResume

     */
    private function iterateCloning($collections, $newResume)
    {
        if(!$collections->isEmpty()) {
            foreach ($collections as $collection) {

                $collection->cloneModel($newResume);

            }
        }
    }

    public function getResumeAndSections($user_name) {
        try {
            $user = $this->userRepository->getUserByUserName($user_name);
            return $this->model->withRelations()->where("user_id",$user->id)->where("default",1)->where("active",1)->firstOrFail();
        }catch (ModelNotFoundException $mnfe){
            //dd($mnfe->getMessage());
            //abort(404);
            return null;
        }
    }

    public function defaultByUserName($userName){
        $user_id = $this->userRepository->getUserByUserName($userName)->id;
        return $this->getPublishedResume($user_id);
    }

    public function resumeByVersion($version){
        try {
            $resumeId = substr($version, strrpos($version, '-') + 1);
            $resume = $this->model->with('biography')->findOrFail($resumeId);
            return $resume;
        }catch (ModelNotFoundException $mnfe){
            //dd($mnfe);
            abort(404);
        }
    }


}