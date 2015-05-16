<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

	protected $guarded = ["id"];
    public static $attributeNames = [
        "names"=>"nombres",
        "phone"=>"teléfono"
    ];

}
