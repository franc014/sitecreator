<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/12/15
 * Time: 4:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class ResumeSectionCommons extends Model{
    use SoftDeletes;
    protected $guarded = ["id","imonth","iyear","emonth","eyear","statusbool"];
    protected $appends = ["imonth","iyear","emonth","eyear","statusbool"];
    protected $dates = ['deleted_at'];

    public function resume(){
        return $this->belongsTo('App\Resume');
    }
    public function cloneModel($newParent){
        $newModel = $this->replicate();
        $newModel->setAttribute("resume_id",$newParent->id);
        $newModel->save();
    }
    /**
     * @param $type, init date or end date
     * @return array
     */
    private function splitDate($type){
        $date = $this->getAttribute($type);
        $arrdate = explode("-",$date);
        return $arrdate;
    }
    public function getImonthAttribute(){
        return $this->splitDate("initdate")[0];
    }

    public function getIyearAttribute(){
        return $this->splitDate("initdate")[1];
    }
    public function getEmonthAttribute(){
        return $this->splitDate("enddate")[0];
    }

    public function getEyearAttribute(){
        return $this->splitDate("enddate")[1];
    }

    public function getStatusboolAttribute(){
        $status = $this->getAttribute("status");
        if($status==1){
            return true;
        }
        return false;
    }
}