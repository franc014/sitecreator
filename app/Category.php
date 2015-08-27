<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    use SoftDeletes;
	protected $table = 'categories';
    protected $guarded = ["id"];
    protected $casts = [
        'id' => 'string'
    ];

    public function saleables(){
        return $this->belongsToMany('App\Saleable','saleable_categories');
    }
    public function projects(){
        return $this->belongsToMany('App\Project','portfolio_categories');
    }
}
