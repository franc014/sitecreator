<?php
namespace App\Services\File;
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/14/15
 * Time: 4:55 PM
 */

interface FileTransformation{
    function transform(TransformableFile $transformableFile);
}