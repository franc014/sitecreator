<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected function user(){
        return $this->belongsTo('App\User');
    }

}
