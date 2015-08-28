<?php namespace App;



class Education extends ResumeSectionCommons {
    protected $table = "educations";
    protected $fillable = ['title','field','place','locality','initdate','enddate','detail','activities',
    'status','resume_id','current','endtimestamp'];
    protected $appends = ["imonth","iyear","emonth","eyear","statusbool","currentplace"];
    public function getCurrentplaceAttribute(){
        $current = $this->getAttribute("current");
        if($current==1){
            return true;
        }
        return false;
    }

}
