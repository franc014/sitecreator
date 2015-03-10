<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saleabledetail extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ["id"];
    protected $appends = ['typetag'];

    protected function saleable(){
        return $this->belongsTo('App/Saleable');
    }
    protected function photo(){
        return $this->morphOne("App\Imageresource",'imageable');
    }

    protected function getTypetagAttribute(){
        $type = $this->getAttribute('type');
        switch ($type){
            case $type==0:
                $tag = "Detalle";
                break;
            case $type==1:
                $tag = "Target";
                break;
            case $type==2:
                $tag = "Ventaja";
                break;
        }
        return $tag;
    }

}
