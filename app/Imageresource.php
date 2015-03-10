<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Imageresource extends Model {

	protected $guarded = ["id"];
    public function imageable(){
        $this->morphTo();
    }

}
