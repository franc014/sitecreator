<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/16/15
 * Time: 11:07 AM
 */

namespace App\Services\File;


use App\Events\FileUploader;
use App\Repositories\PhotoDBStorage;
use Illuminate\Support\Facades\Event;

class FileProcessor {


    /**
     * @var array
     */
    private $typeOfTransformations;
    /**
     * @var TransformableFile
     */
    private $transformableFile;
    /**
     * @var FilePathChanger
     */
    private $filePathChanger;
    /**
     * @var PhotoDBStorage
     */
    private $photoDBStorage;

    function __construct($filePathChanger,array $typeOfTransformations = array(),TransformableFile $transformableFile, PhotoDBStorage $photoDBStorage)
    {
        $this->typeOfTransformations = $typeOfTransformations;
        $this->transformableFile = $transformableFile;
        $this->filePathChanger = $filePathChanger;
        $this->photoDBStorage = $photoDBStorage;
    }

    /**
     * @return TransformableFile
     */
    private function getTransformableFile()
    {
        return $this->transformableFile;
    }

    /**
     * @param TransformableFile $transformableFile
     */
    private function setTransformableFile($transformableFile)
    {
        $this->transformableFile = $transformableFile;
    }

    private function applyFilter(FileTransformation $fileTransformation){
        //dd();
        $fileTransformed =  $fileTransformation->transform($this->getTransformableFile());
        //$this->upload($fileTransformed);
        //$this->setTransformableFile($fileTransformed);
        return $fileTransformed;
        //foreach($this->typeOfTransformations as $typeOfTransformation){

            //$transformedFile = $typeOfTransformation->transform($this->transformableFile);
        //}
        //$this->upload($transformedFile);
        //return $transformation;
    }

    public function process(){
        //TODO: upload without filter
        if(!empty($this->typeOfTransformations)) {
            foreach ($this->typeOfTransformations as $typeOfTransformation) {
                $transformedFile = $this->applyFilter($typeOfTransformation);
                $this->setTransformableFile($transformedFile);
            }
            $this->upload($transformedFile->file());
            $s =  $this->photoDBStorage->store();
            return $s;
        }
        //dd($this->getTransformableFile());
        //$this->upload($this->getTransformableFile());
        /*$s =  $this->photoDBStorage->store();
        return $s;*/
        //dd($s->path);
    }


    private function upload($file){
        $name = $this->filePathChanger;
        //$transmitter = new FileTransmitter($file,$disc,$name);
        //$transmitter->upload();
        Event::fire(new FileUploader($file,$name));
    }


}