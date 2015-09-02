<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\HomeImageDBStorage;
use App\Repositories\HomepageRepository;
use App\Repositories\UsercontenttypeRepository;
use App\Services\File\ImageInterlace;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;
use App\Services\File\ImageRetriever;

class HomepageController extends Controller {
    use ImageRetriever;
    /**
     * @var HomepageRepository
     */
    private $homepageRepository;
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var UsercontenttypeRepository
     */
    private $usercontenttypeRepository;

    function __construct(HomepageRepository $homepageRepository, Guard $auth, UsercontenttypeRepository $usercontenttypeRepository)
    {
        $this->middleware("auth");
        $this->homepageRepository = $homepageRepository;
        $this->auth = $auth;
        $this->usercontenttypeRepository = $usercontenttypeRepository;
        $this->x_image_size = Config::get('directories.imagesizes.home_image.x');
        $this->y_image_size = Config::get('directories.imagesizes.home_image.y');
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $profile_id = $this->auth->user()->profile->id;
        $parent = [
            "foreign"=>"profile_id",
            "value"=>$profile_id
        ];
        $results = $this->homepageRepository->getAllByParentId($parent);
        $data = ["homecallouts"=>$results,"meta"=>["message"=>"ok"]];
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
        $data = $request->all();
        $data['profile_id'] =  $this->auth->user()->profile->id;

        $result = $this->homepageRepository->saveCallout
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
        $data = $request->all();
        $result = $this->homepageRepository->updateCallout(
            $id,
            $data
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
        $result = $this->homepageRepository->remove($id);
        return Response::json($result,200);
	}

    public function getActiveContent(){
        $contents = $this->usercontenttypeRepository->listOfActiveContent($this->auth->user()->id);
        $data = ["contents"=>$contents,"meta"=>["message"=>"ok"]];
        return response($data,200);
    }

    public function uploadHomeImage(Request $request,Filesystem $fileSystem){

        $uploadedFile = $request->file("file");
        $fileName = $uploadedFile->getClientOriginalName();
        $v = Validator::make($request->all(), [
            "file"=>"image | max:10240"
        ]);

        if ($v->fails())
        {
            $errors = ['filename'=>$fileName,'errors'=>$v->errors()];
            return response($errors,502);
        }

        $calloutId = $request->get('data');
        $file = new FileUploaded($uploadedFile);

        //$resizing = new ImageResizer($this->x_image_size,$this->y_image_size);
        $interlace = new ImageInterlace();
        $transformation = [$interlace];
        $prefix = Config::get('directories.prefix.home_image').$calloutId;

        $relativePath = Config::get('directories.upload.home_image');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefix,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new HomeImageDBStorage($fileProperties['path'],$calloutId);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();
        return $this->getImage($fileSystem,$imageCreated);
    }

    public function getUploadedHomeImage(Filesystem $fileSystem, $id){
        $calloutId = $id;
        $image = $this->homepageRepository->getHomeImage($calloutId);

        if($image) {
            try {
                return $this->getImage($fileSystem,$image);
            } catch (\Exception $e) {
                return Response::make("No se ha encontrado la imagen. Intenta refrescar
                el browser nuevamente por favor.", 404);
            }
        }
        return $this->getDefaultImage($fileSystem);

    }

}
