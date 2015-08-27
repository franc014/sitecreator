<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\DetailIconStoreRequest;
use App\Repositories\DetailIconDBStorage;
use App\Repositories\SaleableDetailRepository;
use App\Services\File\FilePathChanger;
use App\Services\File\FileProcessor;
use App\Services\File\FileUploaded;
use App\Services\File\ImageResizer;
use App\Services\File\ImageRetriever;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;

class SaleableDetailController extends Controller {

    use ImageRetriever;
    /**
     * @var SaleableDetailRepository
     */
    private $saleableDetailRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(SaleableDetailRepository $saleableDetailRepository, Guard $auth)
    {
        $this->saleableDetailRepository = $saleableDetailRepository;
        $this->auth = $auth;
        $this->middleware("auth");
        $this->x_image_size = Config::get('directories.imagesizes.detail_icon.x');
        $this->y_image_size = Config::get('directories.imagesizes.detail_icon.y');
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
            "foreign"=>"saleable_id",
            "value"=>$request->get('saleable_id')
        ];
        $results = $this->saleableDetailRepository->getAllByParentId($parent);
        $data = ["saleabledetails"=>$results,"meta"=>["message"=>"ok"]];
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
	public function store(Request $request)
	{
        $data = ["saleable_id"=>$request->get('saleable_id'),
            "detail"=>$request->get('detail'),
            "type"=>$request->get('type')
        ];
        $detail = $this->saleableDetailRepository->saveModel($data);
        $dataResponse = [
            "saleabledetail"=>$detail,
            "meta"=>["result"=>"success","message"=>"El detalle ha sido creado exitosamente"]
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
        $detail = $this->saleableDetailRepository->getById($id);
        $data = ["saleabledetail"=>$detail,"meta"=>["message"=>"ok"]];
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
	public function update($id,Request $request)
	{
        $data = [
        "detail"=>$request->get('detail'),
        "type"=>$request->get('type'),
        ];

        $detail = $this->saleableDetailRepository->updateModel($id,$data);
        $dataResponse = [
            "saleabledetail"=>$detail,
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
        $result = $this->saleableDetailRepository->remove($id);
        return Response::json($result,200);
	}


    public function uploadDescriptionIcon(Request $request,Filesystem $fileSystem){

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

        $saleableId = $request->get('data');
        $file = new FileUploaded($uploadedFile);

        $resizing = new ImageResizer($this->x_image_size,$this->y_image_size);
        $transformation = [$resizing];

        $prefix = Config::get('directories.prefix.detail_icon').$saleableId;

        $relativePath = Config::get('directories.upload.detail_icon');
        $extension = 'png';

        $pathChanger = new FilePathChanger($relativePath,$prefix,$extension);
        $fileProperties = [
            "path"=>$pathChanger->path()
        ];
        $dbStore = new DetailIconDBStorage($fileProperties['path'],$saleableId);
        $processor = new FileProcessor($fileProperties['path'],$transformation,$file,$dbStore);
        $imageCreated = $processor->process();
        return $this->getImage($fileSystem,$imageCreated);
    }

    public function getUploadedIcon(Filesystem $fileSystem, $id){
        $saleableId = $id;
        //$logo = $this->profileRepository->getLogo(Auth::user()->id);
        $icon = $this->saleableDetailRepository->getDetailIcon($saleableId);
        if($icon) {
            try {
                return $this->getImage($fileSystem,$icon);
            } catch (\Exception $e) {
                return Response::make("No se ha encontrado la imagen. Intenta refrescar
                el browser nuevamente por favor.", 404);
            }
        }
        return $this->getDefaultImage($fileSystem);

    }

}
