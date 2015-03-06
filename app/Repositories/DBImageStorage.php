<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/19/15
 * Time: 2:11 PM
 */

namespace App\Repositories;


use App\Events\RemoveFile;
use Illuminate\Support\Facades\Event;

abstract class DBImageStorage {

    public function store()
    {
        $imageData = [
            "path"=>$this->path,
            "imageable_id"=>$this->idProfile,
            "imageable_type"=>'App\Profile'
        ];
        //dd($photoData);
        $image = $this->model->where('imageable_id',$this->idProfile)->first();

        if($image!==null){
            Event::fire(new RemoveFile($image->path));
            $image->update($imageData);
            return $image;
        }else {
            $newImage = $this->model->create($imageData);
            //$newPhoto->create($photoData);
            return $newImage;
        }
    }
}