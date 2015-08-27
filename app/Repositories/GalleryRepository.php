<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:30 PM
 */

namespace App\Repositories;



use App\Projectgalleryimage;

class GalleryRepository extends DBRepository{


    /**
     * @var Education
     */
    protected $model;

    function __construct(Projectgalleryimage $model)
    {
        $this->model = $model;
    }

    function getAllByProjectId($projectId){
        $images = $this->model->where('imageable_id',$projectId)->orderBy('created_at', 'asc')->get();
        return $images;
    }


}