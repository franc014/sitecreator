<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\CategoryListing;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;
use App\Repositories\SaleableRepository;
use App\Saleable;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class SaleableController extends Controller {
    use CategoryListing;
    /**
     * @var SaleableRepository
     */
    private $mainRepository;
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    function __construct(SaleableRepository $mainRepository,CategoryRepository $categoryRepository, Guard $auth)
    {
        $this->middleware('auth');
        $this->mainRepository = $mainRepository;
        $this->auth = $auth;
        $this->categoryRepository = $categoryRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$results = $this->mainRepository->getAllByUserId($this->auth->user()->id);
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
        $categories = $request->get('categories');
        $result = $this->mainRepository->saveWithCategories($data,$categories);
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
		$saleable = $this->mainRepository->getById($id);
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
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
        $data = [
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "type"=>$request->input('type'),
            "featured"=>$request->input('featured')
        ];
        $categories = $request->get('categories');
        $saleable = $this->mainRepository->updateWithCategories($id,$data,$categories);
        $dataResponse = [
            "saleable"=>$saleable,
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
        $result = $this->mainRepository->remove($id);
        return Response::json($result,200);//response($result,200);
	}



}
