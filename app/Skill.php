<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends ResumeSectionCommons {

	protected $guarded = ["id","statusbool"];
    protected $appends = ["statusbool"];


}
