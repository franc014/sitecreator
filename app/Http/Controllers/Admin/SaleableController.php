<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SaleableRepository;
use App\Saleable;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class SaleableController extends Controller {
    /**
     * @var SaleableRepository
     */
    private $saleableRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(SaleableRepository $saleableRepository, Guard $auth)
    {
        $this->middleware('auth');
        $this->saleableRepository = $saleableRepository;
        $this->auth = $auth;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$results = $this->saleableRepository->getAllByUserId($this->auth->user()->id);
        $data = ["saleables"=>$results,"meta"=>["message"=>"ok"]];
        return response($data,200);
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
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		$data = [
            "user_id"=>$this->auth->user()->id,
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "type"=>$request->input('type'),
            "featured"=>$request->input('featured')
        ];
        $result = $this->saleableRepository->saveModel($data);
        $dataResponse = [
            "saleable"=>$result,
            "meta"=>["result"=>"success","message"=>"El servicio o producto ha sido guardado exitosamente"]
        ];
        return Response::json($dataResponse,200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$saleable = $this->saleableRepository->getById($id);
        $data = ["saleable"=>$saleable,"meta"=>["message"=>"ok"]];
        return Response::json($data,200);
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
	public function update($id, Request $request)
	{
        $saleable = $this->saleableRepository->updateModel($id,$request->except(['tagtype','details','prices','detailed','layouttype','isfeatured']));
        $dataResponse = [
            "profile"=>$saleable,
            "meta"=>["result"=>"success","message"=>"Los datos han sido actualizados exitosamente"]
        ];
        return Response::json($dataResponse,200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $result = $this->saleableRepository->remove($id);
        return Response::json($result,200);//response($result,200);
	}

}
