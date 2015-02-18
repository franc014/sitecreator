<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercontenttype extends Model {
    protected $guarded = ['id'];
    protected $table ="usercontents";
    public function contenttype(){
        return $this->belongsTo('App\Contenttype');
    }
}


