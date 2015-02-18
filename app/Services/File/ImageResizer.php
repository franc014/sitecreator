<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/14/15
 * Time: 4:59 PM
 */

namespace App\Services\File;


use App\Events\FileUploader;
use Illuminate\Contracts\Filesystem\Factory as FileSystem;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Intervention\Image\Facades\Image;
use League\Flysystem\AdapterInterface;


class ImageResizer  implements FileTransformation {


    /**
     * @var
     */
    private $xSize;
    /**
     * @var
     */
    private $ySize;

    /**
     * @param $xSize
     * @param $ySize
     */
    function __construct($xSize, $ySize)
    {

        $this->xSize = $xSize;
        $this->ySize = $ySize;
    }

    /**
     * @param TransformableFile $transformableFile
     * @return mixed image resized
     */
    function transform(TransformableFile $transformableFile)
    {
        $resource = $transformableFile->file();
        $xSize = $this->xSize;
        $ySize = $this->ySize;
        //TODO implement try catch block for image transformation
        $transformedImage = Image::make($resource)->resize($xSize,$ySize)->encode('png');
        $newTransformable =  new ImageTransformed($transformedImage);
        return $newTransformable;//$newTransformable->file();
        //new Transformable//$transformedImage;
        //$transformedImage2 = Image::make($transformedImage)->rotate(45)->encode('png');
        //$transformedImage3 = Image::make($transformedImage2)->blur(15)->encode('png');
        //return $transformedImage;
        //Event::fire(new FileUploader($transformedImage3, 'local','esetresasa.png'));

    }


}