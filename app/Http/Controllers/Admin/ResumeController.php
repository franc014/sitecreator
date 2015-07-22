<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ResumeRepository;
use Illuminate\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class ResumeController extends Controller {
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(ResumeRepository $resumeRepository, Guard $auth)
    {
        $this->middleware('auth');
        $this->resumeRepository = $resumeRepository;
        $this->auth = $auth;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $results = $this->resumeRepository->getAllByUserId($this->auth->user()->id);
        $data = ["resumes"=>$results,"meta"=>["message"=>"ok"]];
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
        $user_id = $this->auth->user()->id;
        $data = [
            "user_id"=>$user_id,
            "name"=>$request->get("name"),
            "active"=>0
        ];
        $result = $this->resumeRepository->saveResume($user_id,$data);
        return response($result,200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $resume = $this->resumeRepository->getResume($this->auth->user()->id,$id);
        $data = ["resume"=>$resume,"meta"=>["message"=>"ok"]];
        return response($data,200);
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
        //dd($request->all());
        $result = $this->resumeRepository->updateResume($id,$request->except(["biography","user"]));
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
        $result = $this->resumeRepository->removeResume($this->auth->user()->id,$id);
        return Response::json($result,200);
	}

    public function getResumeDropList(){

        $resumes = $this->resumeRepository->getResumeDropList($this->auth->user()->id);
        $data = ["resumes"=>$resumes,"meta"=>["message"=>"ok"]];
        return response($data,200);

    }

    public function getPublishedResume(){
        try {
            $resume = $this->resumeRepository->getDefaultResume($this->auth->user()->id);
            $data = ["resume" => $resume, "meta" => ["message" => "ok"]];
            return response($data, 200);
        }catch (ModelNotFoundException $mne){
            $data = ["resume" => null, "meta" => ["message" => "error"]];
            return response($data, 200);
        }
    }

    public function publishResume($id){
        $result = $this->resumeRepository->publishResume($id);
        return Response::json($result,200);
    }

    public function setAsDefault($id){
        $result = $this->resumeRepository->defaultResume($id);
        return Response::json($result,200);
    }

    public function cloneResume($id){
        $result = $this->resumeRepository->cloneResume($id);
        return Response::json($result,200);
    }

}
