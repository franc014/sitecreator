<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProfileEditionRequest;
use App\Http\Requests\UploadBiographyPhotoRequest;
use App\Repositories\BioPhotoDBStorage;
use App\Repositories\LogoDBStorage;
use App\Repositories\ProfileRepository;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;

use App\Services\File\ImageRetriever;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller {

    use ImageRetriever;

    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    function __construct( ProfileRepository $profileRepository)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
        $this->x_image_size = Config::get('directories.imagesizes.logo.x');
        $this->y_image_size = Config::get('directories.imagesizes.logo.y');
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
        return Response::json($data,200);
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
     * @param ProfileEditionRequest|Request $request
     * @return Response
     */
    public function update($id,Request $request)
    {
        $result = $this->profileRepository->updateProfileByUserId(Auth::user()->id,$request->except("photo"));
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

    /**
     * @param UploadBiographyPhotoRequest $request
     * @param Filesystem $fileSystem
     * @return mixed
     */
    public function uploadLogo(UploadBiographyPhotoRequest $request, Filesystem $fileSystem){
        //$uploadedFile = Input::file("photo");//$request->only(["photo"]);
        $uploadedFile = $request->file("logo");
        $file = new FileUploaded($uploadedFile);

        $resizing = new ImageResizer($this->x_image_size,$this->y_image_size);
        $transformation = [$resizing];
        $userId = Auth::user()->id;
        $profile = Auth::user()->profile;

        $prefixPhotoBio = Config::get('directories.prefix.logo').$userId;
        $relativePath = Config::get('directories.upload.logo');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefixPhotoBio,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new LogoDBStorage($fileProperties['path'],$profile->id);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();
        return $this->getImage($fileSystem,$imageCreated);
    }

    public function getUploadedLogo(Filesystem $fileSystem/*Filesystem $filesystem/*, Cloud $cloud*/){

        $logo = $this->profileRepository->getLogo(Auth::user()->id);

        if($logo) {
            try {
                return $this->getImage($fileSystem,$logo);
            } catch (\Exception $e) {
                return Response::make("No se ha encontrado la imagen. Intenta refrescar
                el browser nuevamente por favor.", 404);
            }
        }
        return $this->getDefaultImage($fileSystem);

    }

}
