<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon as Carbon;

class Resume extends Model {
    use SoftDeletes;
	protected $guarded = ["id","ispublished","theresaunique","isdefault","url","version"];
    protected $appends = ["ispublished","isdefault","theresaunique","url","version"];
    protected $dates = ['deleted_at'];
    protected $children = ["experiences","educations","skills","languages","interests"];

    public function getIspublishedAttribute(){
        $active = $this->getAttribute("active");
        if($active==1){
            return true;
        }
        return false;
    }

    public function getVersionAttribute(){
        $versionId = $this->getAttribute("id");
        $versionName = $this->getAttribute("name");
        return $versionName."-".$versionId;
    }

    public function getIsdefaultAttribute(){
        $active = $this->getAttribute("default");
        if($active==1){
            return true;
        }
        return false;
    }

    public function getUrlAttribute(){
        $user_name = $this->user->username;
        $versionId = $this->getAttribute("id");
        $versionName = $this->getAttribute("name");
        $base_url = url()."/".$user_name."/".$versionName.$versionId;
        return $base_url;
    }

    public function getTheresauniqueAttribute(){
        if($this->all()->count()==1){
            return true;
        }
        return false;
    }

    public function experiences(){
        return $this->hasMany('App\Experience');
    }
    public function educations(){
        return $this->hasMany('App\Education');
    }
    public function skills(){
        return $this->hasMany('App\Skill');
    }
    public function languages(){
        return $this->hasMany('App\Language');
    }
    public function interests(){
        return $this->hasMany('App\Profinterest');
    }

    public function biography(){
        return $this->belongsTo('App\Biography');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function delete(){
        $this->experiences()->delete();
        $this->educations()->delete();
        $this->skills()->delete();
        $this->languages()->delete();
        $this->interests()->delete();
        parent::delete();
    }

    public function cloneModel(){
        $now = Carbon::now();
        //$oldName = $this->getAttribute("name");
        $oldId = $this->getAttribute("id");
        $randomName = str_random(20);
        $newResume = $this->replicate();
        $newResume->setAttribute("name","clon-".$randomName);
        $newResume->setAttribute("active",0);
        $newResume->setAttribute("default",0);
        $newResume->setAttribute("cloned_id",$oldId);
        $newResume->save();
        return $newResume;
    }

    public function scopeWithRelations($query){
        return $query->with($this->children);
    }


}
