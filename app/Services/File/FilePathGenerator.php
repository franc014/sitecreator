<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/14/15
 * Time: 5:16 PM
 */

namespace App\Services\File;


use Illuminate\Support\Facades\Config;

abstract class FilePathGenerator {

    private $directories;
    private $namePrefix;
    private $mimeType;

    /**
     * @param $directories
     * @param $namePrefix
     * @param $mimeType
     */
    function __construct($directories='',$namePrefix,$mimeType)
    {
        $this->directories = $directories;
        $this->namePrefix = $namePrefix;
        $this->mimeType = $mimeType;
    }

    public function path(){
        $aleatory = str_random(16);
        $directories = $this->directories;
        $namePrefix = $this->namePrefix;
        $mimeType = $this->mimeType;
        $generatedPath =  $directories.$namePrefix."-".$aleatory.".".$mimeType;
        return $generatedPath;
    }
    public function disc(){
        return Config::get('filesystems.default');
    }
}