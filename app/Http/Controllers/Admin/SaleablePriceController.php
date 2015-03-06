<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Repositories\SaleablePriceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SaleablePriceController extends Controller {

    /**
     * @var SaleablePriceRepository
     */
    private $saleablePriceRepository;

    function __construct(SaleablePriceRepository $saleablePriceRepository)
    {
        $this->middleware('auth');
        $this->saleablePriceRepository = $saleablePriceRepository;
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
        $results = $this->saleablePriceRepository->getAllByParentId($parent);
        $data = ["saleableprices"=>$results,"meta"=>["message"=>"ok"]];
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
        /*$data = ["saleable_id"=>$request->get('saleable_id'),
            "detail"=>$request->get('detail'),
            "type"=>$request->get('type')
        ];*/
        $detail = $this->saleablePriceRepository->saveModel($request->all());
        $dataResponse = [
            "saleableprice"=>$detail,
            "meta"=>["result"=>"success","message"=>"El precio ha sido creado exitosamente"]
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
        $detail = $this->saleablePriceRepository->getById($id);
        $data = ["saleableprice"=>$detail,"meta"=>["message"=>"ok"]];
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

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
        /*$data = [
            "detail"=>$request->get('detail'),
            "type"=>$request->get('type'),
        ];*/

        $detail = $this->saleablePriceRepository->updateModel($id,$request->all());
        $dataResponse = [
            "saleableprice"=>$detail,
            "meta"=>["result"=>"success","message"=>"El precio ha sido actualizado exitosamente"]
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
        $result = $this->saleablePriceRepository->remove($id);
        return Response::json($result,200);
	}

}
