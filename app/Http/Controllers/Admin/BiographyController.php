<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BioEditionRequest;
use App\Http\Requests\UploadBiographyPhotoRequest;
use App\Repositories\BiographyRepository;
use App\Repositories\BioPhotoDBStorage;
use App\Repositories\ProfileRepository;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;
use App\Services\File\ImageRetriever;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;


class BiographyController extends Controller {

    use ImageRetriever;

    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    /**
     * @var BiographyRepository
     */
    private $biographyRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct( ProfileRepository $profileRepository, BiographyRepository $biographyRepository,Guard $auth)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
        $this->x_image_size = Config::get('directories.imagesizes.photo_bio.x');
        $this->y_image_size = Config::get('directories.imagesizes.photo_bio.y');
        $this->biographyRepository = $biographyRepository;
        $this->auth = $auth;
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
        $results = $this->biographyRepository->getAllByParentId($parent);
        $data = ["bios"=>$results,"meta"=>["message"=>"ok"]];
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
        //dd($request->all());
        $data = ["user_id"=>$this->auth->user()->id,
            "title"=>$request->get("title"),
            "detail"=>$request->get("detail"),

        ];
        $result = $this->biographyRepository->saveBio
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
     * @param BioEditionRequest|Request $request
     * @return Response
     */
    public function update($id,Request $request)
    {
        $data = ["user_id"=>$this->auth->user()->id,
            "title"=>$request->get("title"),
            "detail"=>$request->get("detail"),
            "status"=>$request->get("status")
        ];
        $result = $this->biographyRepository->updateBio(
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
        $result = $this->biographyRepository->deleteBio($id);
        return Response::json($result,200);
    }

    /**
     * @param UploadBiographyPhotoRequest $request
     * @param Filesystem $fileSystem
     * @return mixed
     */
    public function uploadPhoto(UploadBiographyPhotoRequest $request, Filesystem $fileSystem){
        //$uploadedFile = Input::file("photo");//$request->only(["photo"]);
        $uploadedFile = $request->file("photo");
        $file = new FileUploaded($uploadedFile);

        $resizing = new ImageResizer($this->x_image_size,$this->y_image_size);

        $transformation = [$resizing];
        $userId = Auth::user()->id;
        $profile = Auth::user()->profile;

        $prefixPhotoBio = Config::get('directories.prefix.photo_bio').$userId;
        $relativePath = Config::get('directories.upload.photo_bio');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefixPhotoBio,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new BioPhotoDBStorage($fileProperties['path'],$profile->id);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();
        return $this->getImage($fileSystem,$imageCreated);
    }

    /**
     * @param Filesystem $fileSystem
     * @return mixed
     */
    public function getUploadedPhoto(Filesystem $fileSystem/*Filesystem $filesystem/*, Cloud $cloud*/){

        $photo = $this->profileRepository->getBioPhoto(Auth::user()->id);

        if($photo) {
            try {
                return $this->getImage($fileSystem,$photo);
            } catch (\Exception $e) {
                return Response::make("No se ha encontrado la imagen. Intenta refrescar
                el browser nuevamente por favor.", 404);
            }
        }
        return $this->getDefaultImage($fileSystem);

    }

    public function getBioDropList(){
        $bios = $this->biographyRepository->getBioDropList($this->auth->user()->id);
        $data = ["bios"=>$bios,"meta"=>["message"=>"ok"]];
        return response($data,200);
    }

    public function setDefault($id)
    {
        $result = $this->biographyRepository->setAsDefault($this->auth->user()->id,$id);
        return Response::json($result,200);
    }

}
