<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Saleable extends Model {

    use SoftDeletes;
    use ScopesTrait;
    protected $dates = ['deleted_at'];
    protected $appends = ["tagtype","layouttype","isfeatured"];
    protected $guarded = ["id"];

    public static function boot(){
        parent::boot();
        static::saved(function($model){
            static::setAsNotFeatured($model);
        });
        static::updated(function($model){
            static::setAsNotFeatured($model);
        });
    }
    /**
     * @param $model
     */
    private static function setAsNotFeatured($model)
    {
        $featured = $model->attributes['featured'];
        if ($featured == 1) {
            static::updateSaleablesAsNotFeaturedExcept($model->attributes['id'], $model->attributes['user_id']);
        }
    }
    private static function updateSaleablesAsNotFeaturedExcept($id,$user_id)
    {
       Saleable::where("id","<>",$id)->where("user_id",$user_id)->update(["featured"=>0]);
    }


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

    public function user(){
        return $this->belongsTo('App\User');
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

    public function getLayouttypeAttribute(){
        $layout = $this->getAttribute("detailed");
        if($layout=="1"){
            return "full";
        }else {
            return "simple";
        }
    }

    public function getIsfeaturedAttribute(){
        $featured = $this->getAttribute("featured");
        if($featured=="1"){
            return true;
        }
        return false;

    }





}
