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

    public function saveSaleable($data,$categories){
        $result = $this->saveModel($data);
        //dd($result->categories);
        $result->categories()->sync($categories);
        return $result;
    }
    public function updateSaleable($id,$data,$categories){
        $result = $this->updateModel($id,$data);
        //dd($result->categories);
        $result->categories()->sync($categories);
        return $result;
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

    public function listAllCategories($userId){
        return $this->categoryRepository->allCategoriesByUserId($userId);
    }

    public function listSaleableCategories($saleableId){
        $saleable = $this->model->findOrFail($saleableId);
        $saleable_categories = $saleable->categories->lists('id');
        return $saleable_categories;
    }

}