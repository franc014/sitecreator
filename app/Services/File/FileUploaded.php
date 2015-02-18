<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/14/15
 * Time: 5:05 PM
 */

namespace App\Services\File;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaded implements TransformableFile{


    /**
     * @var UploadedFile
     */
    private $uploadedFile;

    function __construct(UploadedFile $uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }

    function file()
    {
        return $this->uploadedFile;
    }
}