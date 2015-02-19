<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercontenttype extends Model {
    protected $guarded = ['id'];
    protected $table ="usercontents";
    protected $appends = ['activebool'];

    public function contenttype(){
        return $this->belongsTo('App\Contenttype');
    }

    public function getActiveboolAttribute(){
        $active = $this->getAttribute('active');
        if($active==1){
            return true;
        }
        return false;
    }
}


