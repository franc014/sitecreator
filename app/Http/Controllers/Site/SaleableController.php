<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class SaleableController extends Controller {

	public function index($username,$saleable,$id){
        //dd("h");
        $theme = Config::get('pages.theme');
        /*if($type=="simple") {
            return view($theme . 'productos_servicios._detail_simple.index');
        }*/
        return view($theme . 'productos_servicios._detail.index');
    }

}
