<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/17/15
 * Time: 12:16 PM
 */

namespace App\Repositories;


use App\Events\RemoveFile;
use App\Photo;
use Illuminate\Support\Facades\Event;

class BioPhotoDBStorage implements PhotoDBStorage{


    /**
     * @var
     */
    private $path;
    /**
     * @var
     */
    private $idProfile;


    function __construct($path, $idProfile)
    {
        $this->path = $path;
        $this->idProfile = $idProfile;
    }

    public function store()
    {
        $photoData = [
            "path"=>$this->path,
            "imageable_id"=>$this->idProfile,
            "imageable_type"=>'App\Profile'
        ];
        //dd($photoData);
        $photo = Photo::where('imageable_id',$this->idProfile)->first();

        if($photo!==null){
            Event::fire(new RemoveFile($photo->path));
            $photo->update($photoData);
            return $photo;
        }else {
            $newPhoto = Photo::create($photoData);
            //$newPhoto->create($photoData);
            return $newPhoto;
        }
    }
}