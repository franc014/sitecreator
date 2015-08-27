<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\CategoryListing;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Repositories\CategoryRepository;
use App\Repositories\ProjectGalleryImageDBStorage;
use App\Repositories\ProjectImageDBStorage;
use App\Repositories\ProjectRepository;
use App\Services\File\ImageRetriever;
use Illuminate\Auth\Guard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller {
    use CategoryListing;
    use ImageRetriever;
    /**
     * @var ProjectRepository
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

    function __construct(ProjectRepository $mainRepository,CategoryRepository $categoryRepository,Guard $auth)
    {
        $this->middleware("auth");
        $this->mainRepository = $mainRepository;
        $this->auth = $auth;
        $this->categoryRepository = $categoryRepository;
        $this->x_image_size = Config::get('directories.imagesizes.project_image.x');
        $this->y_image_size = Config::get('directories.imagesizes.project_image.y');
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $results = $this->mainRepository->getAllByUserId($this->auth->user()->id);
        $data = ["projects"=>$results,"meta"=>["message"=>"ok"]];
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
            "title"=>$request->get('title'),
            "description"=>$request->get('description'),
        ];
        $categories = $request->get('categories');
        $result = $this->mainRepository->saveWithCategories($data,$categories);
        $dataResponse = [
            "project"=>$result,
            "meta"=>["result"=>"success","message"=>"El proyecto ha sido guardado exitosamente"]
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
        $data = [
            "title"=>$request->input('title'),
            "description"=>$request->input('description'),
            "status"=>$request->get('status'),
        ];
        $categories = $request->get('categories');
        $project = $this->mainRepository->updateWithCategories($id,$data,$categories);
        $dataResponse = [
            "project"=>$project,
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
        return Response::json($result,200);
	}

    public function uploadProjectFeatureImage(Request $request,Filesystem $fileSystem){
        //$uploadedFile = Input::file("photo");//$request->only(["photo"]);
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
        $projectId = $request->get('data');
        $file = new FileUploaded($uploadedFile);

        $resizing = new ImageResizer($this->x_image_size,$this->y_image_size);
        $transformation = [$resizing];

        $prefix = Config::get('directories.prefix.project_image').$projectId;

        $relativePath = Config::get('directories.upload.project_image');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefix,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new ProjectImageDBStorage($fileProperties['path'],$projectId);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();

        return $this->getImage($fileSystem,$imageCreated);
    }

    public function getUploadedProjectImage(Filesystem $fileSystem, $id){
        $projectId = $id;
        //$logo = $this->profileRepository->getLogo(Auth::user()->id);
        $image = $this->mainRepository->getProjectImage($projectId);
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

    public function uploadProjectImageGallery(Request $request){
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
        $projectId = $request->get('data');

        $file = new FileUploaded($uploadedFile);

        $resizing = new ImageResizer($this->x_image_size,$this->y_image_size);
        $transformation = [$resizing];

        $prefix = Config::get('directories.prefix.project_gallery_image').$projectId;

        $relativePath = Config::get('directories.upload.project_gallery_image');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefix,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new ProjectGalleryImageDBStorage($fileProperties['path'],$projectId);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();
        return $imageCreated;

    }

}
