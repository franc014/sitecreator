<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profinterest extends ResumeSectionCommons {

    protected $guarded = ["id","statusbool"];
    protected $appends = ["statusbool"];

}
