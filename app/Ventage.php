<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ventage extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected function saleable(){
        return $this->belongsTo('App/Saleable');
    }

}
