<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 3/9/15
 * Time: 4:57 PM
 */

namespace App\Repositories;



use App\Gallery;
use App\Projectgalleryimage;


class ProjectGalleryImageDBStorage implements PhotoDBStorage{


    /**
     * @var
     */
    protected $path;
    /**
     * @var
     */
    protected $projectId;

    function __construct($path, $projectId)
    {
        $this->path = $path;
        $this->projectId = $projectId;
        $this->model = new Projectgalleryimage();
    }

    function store()
    {
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->projectId,
            "imageable_type"=>'App\Project'
        ];

        $newImage = $this->model->create($imageData);
        return $newImage;

    }
}