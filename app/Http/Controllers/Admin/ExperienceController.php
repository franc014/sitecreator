<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ExperienceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExperienceController extends Controller {

    /**
     * @var ExperienceRepository
     */
    private $experienceRepository;

    function __construct(ExperienceRepository $experienceRepository)
    {
        $this->middleware('auth');
        $this->experienceRepository = $experienceRepository;
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
            "foreign"=>"resume_id",
            "value"=>$request->get('resume_id')
        ];
        $results = $this->experienceRepository->getAllByParentId($parent);

        $data = ["experiences"=>$results,"meta"=>["message"=>"ok"]];
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
        $result = $this->experienceRepository->
        saveExperience(
            $request->all()
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

        $result = $this->experienceRepository->updateExperience(
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
        $result = $this->experienceRepository->remove($id);
        return Response::json($result,200);
	}

}
