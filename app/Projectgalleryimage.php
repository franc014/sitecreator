<?php namespace App;

use App\Events\RemoveFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;

class Projectgalleryimage extends Model {

    protected $guarded = ['id'];
    protected $appends = ['cloudpath'];

    public function imageable(){
        return $this->morphTo();
    }

    public function getCloudpathAttribute(){
        $s3path = Config::get('directories.cloudfullpath');
        return $s3path.$this->getAttribute('path');
    }

    public function delete(){
        Event::fire(new RemoveFile($this->getAttribute('path')));
        parent::delete();
    }


}
