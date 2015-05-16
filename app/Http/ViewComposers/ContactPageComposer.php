<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/24/15
 * Time: 4:34 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\Contracts\View\View;

class ContactPageComposer {
    public function compose(View $view){
        $data = ["isContactPage"=>true];
        $view->with("dataContact",$data);
    }
}