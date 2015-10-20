<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Saleabledetail extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ["id"];
    protected $appends = ['typetag', 'iconpath'];

    public function saleable()
    {
        return $this->belongsTo('App\Saleable');
    }

    protected function photo()
    {
        return $this->morphOne("App\Imageresource", 'imageable');
    }

    protected function getTypetagAttribute()
    {
        $type = $this->getAttribute('type');
        switch ($type) {
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
        $saleableDetailType = $this->getAttribute('type');
        $s3_path = Config::get('directories.cloudfullpath');
        $characteristic_default_icon = Config::get('directories.default_images.characteristic_default_icon');
        $benefit_default_icon = Config::get('directories.default_images.benefit_default_icon');
        if ($this->photo !== null) {
            $path = $this->photo->path;
            $disc = Config::get("directories.user_photos");
            $fullPath = $disc . $path;
            return $fullPath;
        }
        if($saleableDetailType==2){
            return $s3_path.$benefit_default_icon;
        }
        return $s3_path.$characteristic_default_icon;
    }

}
