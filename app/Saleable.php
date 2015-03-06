<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saleable extends Model {

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $appends = ["tagtype"];
    protected $guarded = ["id"];

    public function details(){
        return $this->hasMany('App\Saleabledetail');
    }
    public function targets(){
        return $this->hasMany('App\Target');
    }
    public function ventages(){
        return $this->hasMany('App\Ventage');
    }
    public function prices(){
        return $this->hasMany('App\Price');
    }
    public function delete(){
        $this->details()->delete();
        $this->prices()->delete();
       //$this->targets()->delete();
        //$this->ventages()->delete();
        return parent::delete();
    }

    public function getTagtypeAttribute(){
        $type = $this->getAttribute('type');
        if($type==0){
            return "Producto";
        }
        return "Servicio";
    }

}
