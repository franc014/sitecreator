<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends ResumeSectionCommons {

    protected $guarded = ["id","statusbool"];
    protected $appends = ["statusbool"];

}
