<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GalleryController extends Controller {

    /**
     * @var GalleryRepository
     */
    private $galleryRepository;

    function __construct(GalleryRepository $galleryRepository)
    {
        $this->middleware("auth");
        $this->galleryRepository = $galleryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function index(Request $request)
	{
        $parent = [
            "foreign"=>"imageable_id",
            "value"=>$request->get('project_id')
        ];
        $results = $this->galleryRepository->getAllByParentId($parent);
        $data = ["galimages"=>$results,"meta"=>["message"=>"ok"]];
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
	public function store()
	{
		//
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
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $result = $this->galleryRepository->remove($id);
        return Response::json($result,200);
	}

}
