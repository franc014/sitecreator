<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    protected function saleable(){
        return $this->belongsTo('App/Saleable');
    }

}
