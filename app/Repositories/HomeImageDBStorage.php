<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 3/9/15
 * Time: 4:57 PM
 */

namespace App\Repositories;


use App\Events\RemoveFile;
use App\Imageresource;
use Illuminate\Support\Facades\Event;

class HomeImageDBStorage implements PhotoDBStorage{


    /**
     * @var
     */
    protected $path;
    /**
     * @var
     */
    protected $calloutId;

    function __construct($path, $calloutId)
    {
        $this->path = $path;
        $this->calloutId = $calloutId;
        $this->model = new Imageresource();
    }

    function store()
    {
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->calloutId,
            "imageable_type"=>'App\Homecall'
        ];
        //dd($photoData);
        $image = $this->model->where('imageable_id',$this->calloutId)->first();

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