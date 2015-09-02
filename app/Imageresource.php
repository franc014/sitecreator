<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Imageresource extends Model {

	protected $guarded = ["id"];
    protected $appends = ['cloudpath'];
    public function imageable(){
        $this->morphTo();
    }

    public function getCloudpathAttribute(){
        $s3path = Config::get('directories.cloudfullpath');
        return $s3path.$this->getAttribute('path');
    }

}
