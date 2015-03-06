<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model {

	protected $guarded = ['id'];
    public function imageable(){
        return $this->morphTo();
    }

}
