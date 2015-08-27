<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/17/15
 * Time: 1:55 PM
 */

namespace App\Services\File;
use Illuminate\Support\Facades\Response;

trait ImageRetriever {
    public $x_image_size;
    public $y_image_size;

    public function getImage($fileSystem,$photo){
        $imagePath = $photo->path;
        $fileUploaded = $fileSystem->get($imagePath);
        return $this->resource($fileUploaded);
    }


    public function getDefaultImage($fileSystem){
        $imagePath = 'default.png';
        $defaultFile = $fileSystem->get($imagePath);
        return $this->resource($defaultFile);
    }

    private function resource($resource){
        $img = base64_encode($resource);
        //dd($dimensions);
        $headers = array(
            'Content-type' => 'image/png',
            'Content-Type' =>'application/json'
        );
        $data = ["img"=>$img,
            "width"=>$this->x_image_size,
            "height"=>$this->y_image_size,
            "message"=>"La imagen ha sido cargada exitosamente!"
        ];
        return Response::json($data,200,$headers);

    }


}