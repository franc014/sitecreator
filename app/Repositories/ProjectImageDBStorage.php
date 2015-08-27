<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 3/9/15
 * Time: 4:57 PM
 */

namespace App\Repositories;


use App\Events\RemoveFile;
use App\Gallery;
use App\Imageresource;
use App\Project;
use App\Projectimage;
use Illuminate\Support\Facades\Event;

class ProjectImageDBStorage implements PhotoDBStorage{


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
        $this->model = new Projectimage();
    }

    function store()
    {
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->projectId,
            "imageable_type"=>'App\Project'
        ];
        //dd($photoData);
        $image = $this->model->where('imageable_id',$this->projectId)->first();

        if($image!==null){
            Event::fire(new RemoveFile($image->path));
            $image->update($imageData);
            return $image;
        }else {
            $newImage = $this->model->create($imageData);
            return $newImage;
        }
    }
}