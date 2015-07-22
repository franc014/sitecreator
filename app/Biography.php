<?php namespace App;



class Biography extends ResumeSectionCommons {

	protected $table = "bios";
    protected $guarded = ["id","statusbool","updated_at","isused","defaultbool"];
    protected $appends = ["statusbool","isused","defaultbool"];

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

    protected function getDefaultboolAttribute(){
        $default = $this->getAttribute("default");
        if($default==1){
            return true;
        }
        return false;
    }

}
