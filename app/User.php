<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Config;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	protected $appends = ['gravatar','hasprofile','names'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password','usertype_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function profile(){
		return $this->hasOne('App\Profile');
	}
	public function photo(){
		return $this->morphOne('App\Photo','imageable');
	}
    public function saleable(){
        return $this->hasMany('App\Saleable');
    }

	protected function getGravatarAttribute(){
		$email = $this->getAttribute('email');
		$photo = $this->profile->logo;
		//dd($photo);
		$defaultGravatar = urlencode(Config::get('directories.default_gravatar'));
		//$url = Config::get('directories.user_photos').$photo->path;
		if($photo===null){
			//$photography = $this->photo->path;
			$url = "http://www.gravatar.com/avatar/".md5(mb_strtolower($email))."?default=".$defaultGravatar."";
		}else{
			$url = Config::get('directories.user_photos').$photo->path;
		}
		return $url;
	}

	protected function getHasprofileAttribute(){
		if($this->profile===null){
			return false;
		}
		return true;
	}

	//belongs to many contenttypes
    //pivot contenttype_user
	protected function contenttypes(){
		return $this->belongsToMany('App\Contenttype','usercontents')->withPivot('active');
	}

    protected function resumes(){
        return $this->hasMany('App\Resume');
    }

    protected function getNamesAttribute(){
        $firstName = $this->getAttribute('username');
        $lastName = "";
        if($this->hasprofile){
            if($this->profile->firstname!=""){
                $firstName = $this->profile->firstname;
            }
            if($this->profile->lastname!=""){
                $lastName = $this->profile->lastname;
            }
        }
        return $firstName." ".$lastName;
    }

}
