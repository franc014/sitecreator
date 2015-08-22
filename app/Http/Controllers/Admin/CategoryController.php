<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller {

    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    function __construct(CategoryRepository $categoryRepository,Guard $auth)
    {
        $this->middleware('auth');
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
        $parent = [
            "foreign"=>"user_id",
            "value"=>$this->auth->user()->id
        ];
        $results = $this->categoryRepository->getAllByParentId($parent);
        $data = ["cats"=>$results,"meta"=>["message"=>"ok"]];
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
            'user_id'=>$this->auth->user()->id,
            'name'=>$request->get('name'),
            'description'=>$request->get('description')
        ];
        $result = $this->categoryRepository->saveCategory
        (
            $data
        );
        return Response::json($result,200);
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
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id,Request $request)
	{
        $result = $this->categoryRepository->updateCategory(
            $id,
            $request->all()
        );
        return Response::json($result,200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $result = $this->categoryRepository->remove($id);
        return Response::json($result,200);
	}

}
