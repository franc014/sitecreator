<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Homecall;

class HomepageRepository extends DBRepository{


    /**
     * @var Homecall
     */
    protected $model;

    function __construct(Homecall $model)
    {
        $this->model = $model;
    }

    public function saveCallout($data){
        $homecallout = $this->saveModel($data);
        return $dataResponse = [
            "homecallout"=>$homecallout,
            "meta"=>["result"=>"success","message"=>"El ítem fue creado exitosamente"]
        ];
    }

    public function updateCallout($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "homecallout"=>$result,
            "meta"=>["result"=>"success","message"=>"El ítem ha sido actualizado exitosamente"]
        ];
    }

    public function getHomeImage($calloutId){
        $callout = $this->model->find($calloutId);
        return $callout->photo;
    }


}