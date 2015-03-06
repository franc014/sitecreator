<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\SaleableDetailRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SaleableDetailController extends Controller {


    /**
     * @var SaleableDetailRepository
     */
    private $saleableDetailRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(SaleableDetailRepository $saleableDetailRepository, Guard $auth)
    {
        $this->saleableDetailRepository = $saleableDetailRepository;
        $this->auth = $auth;
        $this->middleware("auth");
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $parent = [
            "foreign"=>"saleable_id",
            "value"=>$request->get('saleable_id')
        ];
        $results = $this->saleableDetailRepository->getAllByParentId($parent);
        $data = ["saleabledetails"=>$results,"meta"=>["message"=>"ok"]];
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
	 * @return Response
	 */
	public function store(Request $request)
	{
        $data = ["saleable_id"=>$request->get('saleable_id'),
            "detail"=>$request->get('detail'),
            "type"=>$request->get('type')
        ];
        $detail = $this->saleableDetailRepository->saveModel($data);
        $dataResponse = [
            "saleabledetail"=>$detail,
            "meta"=>["result"=>"success","message"=>"El detalle ha sido creado exitosamente"]
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
        $detail = $this->saleableDetailRepository->getById($id);
        $data = ["saleabledetail"=>$detail,"meta"=>["message"=>"ok"]];
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
	public function update($id,Request $request)
	{
        $data = [
        "detail"=>$request->get('detail'),
        "type"=>$request->get('type'),
        ];

        $detail = $this->saleableDetailRepository->updateModel($id,$data);
        $dataResponse = [
            "saleabledetail"=>$detail,
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
        $result = $this->saleableDetailRepository->remove($id);
        return Response::json($result,200);
	}

}
