<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Saleabledetail extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ["id"];
    protected $appends = ['typetag','iconpath'];

    public function saleable(){
        return $this->belongsTo('App\Saleable');
    }
    protected function photo(){
        return $this->morphOne("App\Imageresource",'imageable');
    }

    protected function getTypetagAttribute(){
        $type = $this->getAttribute('type');
        switch ($type){
            case 0:
                $tag = "Detalle";
                break;
            case 1:
                $tag = "Target";
                break;
            case 2:
                $tag = "Ventaja";
                break;
        }
        return $tag;
    }

    public function getIconpathAttribute()
    {
        if ($this->photo !== null) {
        $path = $this->photo->path;
        $disc = Config::get("directories.user_photos");
        $fullPath = $disc . $path;
        return $fullPath;
        }
        return "";
    }

}
