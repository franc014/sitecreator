<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProfileEditionRequest;
use App\Http\Requests\UploadBiographyPhotoRequest;
use App\Repositories\BioPhotoDBStorage;
use App\Repositories\ProfileRepository;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller {



    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    function __construct( ProfileRepository $profileRepository)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $profiles = $this->profileRepository->allProfiles($userId);
        $data = ["profiles"=>$profiles,
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
        $userId = Auth::user()->id;
        $profile = $this->profileRepository->findByUserId($userId);
        $data = ["profile"=>$profile,
            "meta"=>["message"=>"Ok"]
        ];
        return Response::json($data,202);
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
    public function update($id,ProfileEditionRequest $request)
    {
        $result = $this->profileRepository->updateProfileByUserId(Auth::user()->id,$request->all());
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
        //
    }

}
