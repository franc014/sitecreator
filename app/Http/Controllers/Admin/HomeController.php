<?php namespace App\Http\Controllers\Admin;

use App\Events\CreateSessionContent;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware(['auth', 'sessionsetting']);
	}

	public function index()
	{
		//dd(Session::get('user'));
		$username = loggedUserNames();//Auth::user()->username;
		//dd(Auth::user()->isnew);
		$photo = loggedUserPhoto();
		$data['loggedUser'] = [
			"username"=>$username,
			"photo"=>$photo
		];

		return view('admin.home',$data);
	}
	public function about(){
		//dd(Session::get('user')."about");
	}

	public function profile(){
		return Auth::user();
	}



}
