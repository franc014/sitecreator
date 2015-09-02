<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/16/15
 * Time: 12:26 PM
 */

namespace App\Services\File;


use Intervention\Image\Facades\Image;

class ImageInterlace implements FileTransformation{

    function transform(TransformableFile $transformableFile)
    {
        $resource = $transformableFile->file();
        //try, catch
        $transformedImage = Image::make($resource)->interlace(true)->encode('jpg');
        $newTransformed = new ImageTransformed($transformedImage);
        return $newTransformed;//$newTransformed->file();
    }
}