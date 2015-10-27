<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;




use App\Category;

class CategoryRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Category $model)
    {
        $this->model = $model;
    }


    public function saveCategory($data){
        $data = $this->addRandomLabelColor($data);

        $category = $this->saveModel($data);
        return $dataResponse = [
            "category"=>$category,
            "meta"=>["result"=>"success","message"=>"La categoría fue creada exitosamente"]
        ];
    }

    public function updateCategory($id,$data){
        $result = $this->updateModel($id,$data);
        return $dataResponse = [
            "category"=>$result,
            "meta"=>["result"=>"success","message"=>"La categoría ha sido actualizada exitosamente"]
        ];
    }

    public function allCategoriesByUserId($userId){
        $categories = $this->model->where('user_id',$userId)->lists('name','id');
        return $categories;
    }

    public function modelCategories($model,$userId,$except=0){
        $categories = $this->model->whereHas($model,function($q) use ($userId){
            $q->where('user_id',$userId);
        })->with($model)->get();

        foreach($categories as $cat){
            foreach($cat[$model] as $sa){
                if($except!=0){
                    if($sa['id']!= $except){
                        $categories->pull($cat);
                    }
                }
            }
        }
        return $categories;
    }

    private function addRandomLabelColor($data)
    {
        $color = getRandomHexadecimalColor();
        $data['labelcolor'] = $color;
        return $data;
    }




}