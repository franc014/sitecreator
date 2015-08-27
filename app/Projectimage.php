<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectimage extends Model {

    protected $guarded = ['id'];


    public function imageable(){
        return $this->morphTo();
    }

}
