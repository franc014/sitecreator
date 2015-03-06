<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/19/15
 * Time: 2:08 PM
 */

namespace App\Repositories;
use App\Events\RemoveFile;
use App\Logo;
use Illuminate\Support\Facades\Event;

class LogoDBStorage extends DBImageStorage implements PhotoDBStorage{

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
        $this->model = new Logo();

    }


}