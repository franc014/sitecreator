<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/9/15
 * Time: 4:05 PM
 */

namespace App\Repositories;


use App\Contenttype;
use App\User;
use App\Usercontenttype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UsercontenttypeRepository {


    /**
     * @var ContentypeRepository
     */
    private $model;

    /**
     * @var ContentypeRepository
     */
    private $contentypeRepository;
    private $defaultHomePage;

    function __construct(Usercontenttype $usercontenttype, ContentypeRepository $contentypeRepository)
    {

        $this->model = $usercontenttype;
        $this->contentypeRepository = $contentypeRepository;
        $this->defaultHomePage = Config::get("pages.default_home_page");
    }

    public function getAllByUserId($user_id){
        //$user = User::find($user_id);
        $contenttypes = $this->model->with('contenttype')->whereUserId($user_id)->get();//Contenttype::all();//$this->model->all()->toArray();
        //$contenttypes = $user->contenttypes->toArray();

        //dd($user->contenttypes);
        //dd($contenttypes);
        //TODO: catch non existing rows
        return $contenttypes;//$contenttypes->toArray();
    }

    public function create($user_id){
        $contenttypes = $this->contentypeRepository->getAll();
        foreach($contenttypes as $contenttype){

            $data = [
                "user_id"=>$user_id,
                "contenttype_id"=>$contenttype->id,
                "active"=>1,
                "asHome"=>$contenttype->setashome,
                "url"=>$contenttype->pagelink,
                "menualias"=>$contenttype->type,
                "pagetitle"=>$contenttype->pagetitle,
                "pagedescription"=>$contenttype->pagedescription,
                "order"=>$contenttype->order
            ];
            $this->model->create($data);
        }
        //TODO: check saving and return errors if something wrong with db
    }

    public function updateContent($id, $data1,$userId){
        $data = $data1;
        //dd($data);
        $usercontent = $this->model->find($id);

        //dump($usercontent->toArray());
        $updated = $usercontent->update($data);
        if($data1["ashome"]==1){
            $this->unsetContentAsHomeExcept($usercontent->id,$usercontent->user_id);
        }else{
            if(!$this->isUserContentSetAsHomePage($userId)){
                $this->setDefaultHomePage($userId);
            }
        }

        $dataResponse = [
            "contenttype"=>$usercontent,
            "meta"=>["result"=>"success","message"=>"El contenido ha sido actualizado exitosamente"]
        ];
        return $dataResponse;
        //return json_encode(['saved'=>true]);
    }

    private function unsetContentAsHomeExcept($id,$userId)
    {
        $this->model->where("id","<>",$id)->where("user_id",$userId)->update(["ashome"=>0]);
    }

    private function isUserContentSetAsHomePage($userId)
    {
        $contents = $this->model->where("user_id",$userId)
                    ->where("ashome",1)->get()->count();
        if($contents==0){
            return false;
        }
        return true;

    }

    private function setDefaultHomePage($userId)
    {

        $defaultContent = $this->contentypeRepository->getByTypeName($this->defaultHomePage);
        //dd($this->defaultHomePage);
        $this->model->where("user_id",$userId)->where("contenttype_id",$defaultContent->id)->update(["ashome"=>1]);
    }

    public function listOfActiveContent($userId){
        return $this->model->where('user_id',$userId)->where('active',1)->get();
    }


}