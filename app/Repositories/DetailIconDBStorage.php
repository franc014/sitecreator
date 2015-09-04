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
        $imageable_type = 'App\Saleabledetail';
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->saleableId,
            "imageable_type"=>$imageable_type
        ];
        //dd($photoData);
        $image = $this->model->where('imageable_id',$this->saleableId)
            ->where('imageable_type',$imageable_type)
            ->first();

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