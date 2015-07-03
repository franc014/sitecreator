<?php namespace App;



class Biography extends ResumeSectionCommons {

	protected $table = "bios";
    protected $guarded = ["id","statusbool","updated_at"];
    protected $appends = ["statusbool"];

    public function resumes(){
        return $this->hasMany('App\Resume');
    }

}
