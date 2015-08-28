<?php namespace App;




use Carbon\Carbon;

class Experience extends ResumeSectionCommons {
    protected $fillable = ['title','place','locality','initdate','enddate','detail',
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
