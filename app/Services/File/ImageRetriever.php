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
        $headers = array(
            'Content-type' => 'image/png',
            'Content-Type' =>'application/json'
        );
        $data = ["img"=>$img,"message"=>"Tu foto ha sido cargada exitosamente!"];
        return Response::json($data,200,$headers);

    }


}