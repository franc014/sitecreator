<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/16/15
 * Time: 11:12 AM
 */

namespace App\Services\File;


class FilePathChanger extends FilePathGenerator{
    use FileSystemUsed;
    public function disc(){
        return $this->getStorage();
    }
}