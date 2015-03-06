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

class BioPhotoDBStorage extends DBImageStorage implements PhotoDBStorage{


    /**
     * @var
     */
    protected $path;
    /**
     * @var
     */
    protected $idProfile;

    protected $model;

    function __construct($path, $idProfile)
    {
        $this->path = $path;
        $this->idProfile = $idProfile;
        $this->model = new Photo();
    }


}