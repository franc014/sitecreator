<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller {


    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;

    function __construct(ContenttypeRepository $contenttypeRepository,ResumeRepository $resumeRepository)
    {
        $this->contenttypeRepository = $contenttypeRepository;
        $this->resumeRepository = $resumeRepository;
    }

    public function index($userName,$version=null){
        $homeItem = $this->contenttypeRepository->getHomeItemByUserName($userName);
        if($version==null) {
            $version = $this->resumeRepository->defaultByUserName($userName)->version;
        }

        try {
            return redirect($userName . "/$version/" . $homeItem->url);
        }catch (ModelNotFoundException $mnfe){
            return redirect()->home();
        }

    }

}
