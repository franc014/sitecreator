<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenttype extends Model {

	protected $guard = ['id'];
	/*protected function users(){
		return $this->belongsToMany('App\Users','usercontents');
	}*/

	protected function usercontenttypes(){
		return $this->hasMany('App\Usercontenttype');
	}
}
