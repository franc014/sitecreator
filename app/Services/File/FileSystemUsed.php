<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/16/15
 * Time: 6:45 PM
 */

namespace App\Services\File;


trait FileSystemUsed {
    protected $storage = 's3';

    /**
     * @return string
     */
    public function getStorage()
    {
        return $this->storage;
    }
}