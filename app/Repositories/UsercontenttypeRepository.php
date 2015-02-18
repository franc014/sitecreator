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

class UsercontenttypeRepository {


    /**
     * @var ContentypeRepository
     */
    private $model;
    /**
     * @var Usercontenttype
     */
    private $usercontenttype;
    /**
     * @var ContentypeRepository
     */
    private $contentypeRepository;

    function __construct(Usercontenttype $usercontenttype, ContentypeRepository $contentypeRepository)
    {

        $this->model = $usercontenttype;
        $this->contentypeRepository = $contentypeRepository;
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
                "active"=>1
            ];
            //dd($data);
            $this->model->create($data);
        }
        //TODO: check saving and return errors if something wrong with db
    }

    public function updateContent($id, $data1){
        $data = $data1;
        //dd($data);
        $usercontent = $this->model->find($id);

        //dump($usercontent->toArray());
        $updated = $usercontent->update($data);
        $dataResponse = [
            "contenttype"=>$usercontent,
            "meta"=>["result"=>"success","message"=>"El contenido ha sido actualizado exitosamente"]
        ];
        return $dataResponse;
        //return json_encode(['saved'=>true]);
    }
}