<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/16/15
 * Time: 1:08 PM
 */

namespace App\Services\File;


use Intervention\Image\Image;

class ImageTransformed implements TransformableFile{

    /**
     * @var Image
     */
    protected $image;

    function __construct($image)
    {

        $this->image = $image;
    }

    function file()
    {   //dd($this->image);
        return $this->image;
    }
}