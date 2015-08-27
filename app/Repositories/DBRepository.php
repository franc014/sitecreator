<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/27/15
 * Time: 6:36 PM
 */

namespace App\Repositories;


abstract class DBRepository {
    public function updateModel($id,$data){
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }

    public function saveModel($data){
        $model = $this->model->create($data);
        return $model;
    }

    public function getAllByParentId($parent){
        return $this->model->where($parent['foreign'],$parent['value'])->get();
    }

    public function remove($id){
        $item = $this->model->find($id);
        $removed = $item->delete();
        //TODO: validate delete
        $data = ["result"=>"success","message"=>"El ítem ha sido removido exitosamente!"];
        return $data;
    }

    public function getById($id){
        return $this->model->find($id)->toArray();
    }

    public function listModelCategoriesById($id){
        $model = $this->model->findOrFail($id);
        $categories = $model->categories->lists('id');
        return $categories;
    }

    public function saveWithCategories($data,$categories){
        $result = $this->saveModel($data);
        if(!empty($categories)) {
            $result->categories()->sync($categories);
        }
        return $result;
    }
    public function updateWithCategories($id,$data,$categories){
        $result = $this->updateModel($id,$data);
        if(!empty($categories)) {
            $result->categories()->sync($categories);
        }
        return $result;
    }

}