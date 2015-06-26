<?php namespace App;




class Experience extends ResumeSectionCommons {
    protected $guarded = ["id","imonth","iyear","emonth","eyear","statusbool","currentplace"];
    protected $appends = ["imonth","iyear","emonth","eyear","statusbool","currentplace"];

    public function getCurrentplaceAttribute(){
        $current = $this->getAttribute("current");
        if($current==1){
            return true;
        }
        return false;
    }

}
