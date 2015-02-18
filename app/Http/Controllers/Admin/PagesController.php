<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index($page){
        //dd($page);
        //dd(Session::get('user'));
        $username = loggedUserNames();//Auth::user()->username;
        //dd(Auth::user()->isnew);
        $photo = loggedUserPhoto();
        $data['loggedUser'] = [
            "username"=>$username,
            "photo"=>$photo,
            "img"=>"aa"
        ];

        return view('admin.'.$page.'.index',$data);
    }

}
