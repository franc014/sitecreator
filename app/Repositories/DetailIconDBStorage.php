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
use App\Photo;
use Illuminate\Support\Facades\Event;

class DetailIconDBStorage implements PhotoDBStorage{


    /**
     * @var
     */
    protected $path;
    /**
     * @var
     */
    protected $saleableId;

    function __construct($path, $saleableId)
    {
        $this->path = $path;
        $this->saleableId = $saleableId;
        $this->model = new Imageresource();
    }

    function store()
    {
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->saleableId,
            "imageable_type"=>'App\Saleabledetail'
        ];
        //dd($photoData);
        $image = $this->model->where('imageable_id',$this->saleableId)->first();

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