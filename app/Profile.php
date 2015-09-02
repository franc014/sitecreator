<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Profile extends Model {
    protected $guarded = ['id','biophoto'];
    protected $appends = ['biophoto'];

	public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->morphOne('App\Photo','imageable');
    }
    public function logo(){
        return $this->morphOne('App\Logo','imageable');
    }

    protected function getBiophotoAttribute(){
        if($this->photo !==null) {
            $photo = $this->photo->path;
            //dd($photo);
            return Config::get("directories.user_photos") . $photo;
        }
        return "";
    }

    public function homecalls(){
        return $this->hasMany('App\Homecall');
    }

}
