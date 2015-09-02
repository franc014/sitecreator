<?php namespace App;

use App\Events\RemoveFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;

class Homecall extends Model {
    use SoftDeletes;
    protected $fillable = ['message','buttonlink','buttonmessage','profile_id','status'];
    protected $appends = ["statusbool"];

    public function getStatusboolAttribute(){
        $status = $this->getAttribute("status");
        if($status==1){
            return true;
        }
        return false;
    }

    public function profile(){
        return $this->belongsTo('App\Profile');
    }

    public function photo(){
        return $this->morphOne('App\Imageresource','imageable');
    }

    public function delete(){
        $photo = $this->photo;
        if($photo != null){
            Event::fire(new RemoveFile($photo->path));
            $this->photo()->delete();
        }
        parent::delete();
    }





}
