<?php namespace App;



class Biography extends ResumeSectionCommons {

	protected $table = "bios";
    protected $guarded = ["id","statusbool","updated_at","isused"];
    protected $appends = ["statusbool","isused"];

    public function resumes(){
        return $this->hasMany('App\Resume');
    }

    protected function getIsusedAttribute(){
        $resumes = $this->resumes;
        //dd($resumes);
        if(!$resumes->isEmpty()){
            return true;
        }
        return false;
    }

}
