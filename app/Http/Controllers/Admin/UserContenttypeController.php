<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\UsercontenttypeRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UserContenttypeController extends Controller {

	/**
	 * @var UsercontenttypeRepository
	 */
	private $usercontenttypeRepository;
	/**
	 * @var Guard
	 */
	private $auth;

	function __construct(UsercontenttypeRepository $usercontenttypeRepository,Guard $auth)
	{
		$this->middleware('auth');
		$this->usercontenttypeRepository = $usercontenttypeRepository;
		$this->auth = $auth;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$data = ["contenttypes"=>$this->usercontenttypeRepository->getAllByUserId(49)];
		//dump($data);
		//return $data;//Response::json($data,202);
		//return User::all()->toArray();//$this->usercontenttypeRepository->getAllByUserId(49);
		$types = $this->usercontenttypeRepository->getAllByUserId($this->auth->user()->id);
		$data = [
			"usercontenttypes"=>$types,
			"meta"=>["message"=>"Ok"]
		];
		return Response::json($data,202);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{   //dd(Input::all());
		$active = 0;
		if(Input::get('active')){
			$active = 1;
		}
		$data = [
			"active"=>$active,
            "ashome"=>Input::get('ashome'),
            "menualias"=>Input::get('menualias'),
            "pagetitle"=>Input::get('pagetitle'),
            "pagedescription"=>Input::get('pagedescription')
        ];
		$updated = $this->usercontenttypeRepository->updateContent($id,$data,$this->auth->user()->id);

		return Response::json($updated, 202);
		//dd(Input::get('active'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
