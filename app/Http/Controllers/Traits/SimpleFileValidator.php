<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 8/26/15
 * Time: 4:34 PM
 */

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Trait SimpleFileValidator {
    public function validateFile($request){

        $fileName = $request->file('file')->getClientOriginalName();
        $v = Validator::make($request->all(), [
            "file"=>"image | max:10240"
        ]);

        if ($v->fails())
        {
            $errors = ['filename'=>$fileName,'errors'=>$v->errors()];
            return response($errors,502);
        }
    }
}