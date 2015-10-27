<?php namespace App;

use App\Events\RemoveFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Event;

class Project extends Model {
    use SoftDeletes;
	protected $fillable = ['user_id','title','description','featured_image','status'];
    protected $appends = ['statusbool','slug'];
    public function getStatusboolAttribute(){
        $status = $this->getAttribute("status");
        if($status==1){
            return true;
        }
        return false;
    }
    public function photo(){
        return $this->morphOne('App\Projectimage','imageable');
    }
    public function gallery_images(){
        return $this->morphMany('App\Projectgalleryimage','imageable');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function categories(){
        return $this->belongsToMany('App\Category','portfolio_categories')->withTimestamps();
    }

    public function delete(){
        $photo = $this->photo;
        if($photo != null){
            Event::fire(new RemoveFile($photo->path));
            $this->photo()->delete();
        }

        $gallery = $this->gallery_images;
        if(!$gallery->isEmpty()){
            foreach($gallery as $image){
                Event::fire(new RemoveFile($image->path));
            }
            $this->gallery_images()->delete();

        }
        parent::delete();
    }

    public function getSlugAttribute(){
        $title = $this->getAttribute('title');
        $slug = str_replace(' ','-',$title);
        return $slug;
    }



}
