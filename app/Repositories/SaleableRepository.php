<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/25/15
 * Time: 3:38 PM
 */

namespace App\Repositories;


use App\Saleable;

class SaleableRepository extends DBRepository{

    /**
     * @var Saleable
     */
    protected $model;
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    function __construct(Saleable $model,CategoryRepository $categoryRepository)
    {
        $this->model = $model;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllByUserId($userId){
        //return $this->model->with('details')->where('user_id',$userId)->get();
        return $this->model->where('user_id',$userId)->get();
    }



    public function remove($serviceId){
        $saleable = $this->model->find($serviceId);
        $removed = $saleable->delete();
        //TODO: validate delete
        $data = ["result"=>"success","message"=>"El servicio o producto ha sido removido exitosamente!"];
        return $data;
    }
    public function getById($serviceId){
        return $this->model->find($serviceId)->toArray();
    }



}