<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;


use App\Language;

class LanguageRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Language $model)
    {
        $this->model = $model;
    }

    public function saveLanguage($data){
        $language = $this->saveModel($data);
        return $dataResponse = [
            "language"=>$language,
            "meta"=>["result"=>"success","message"=>"El idioma fue creado exitosamente"]
        ];
    }

    public function updateLanguage($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "language"=>$result,
            "meta"=>["result"=>"success","message"=>"El idioma ha sido actualizado exitosamente"]
        ];
    }


}