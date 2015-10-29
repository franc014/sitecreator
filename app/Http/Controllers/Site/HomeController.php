<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller {
    //Trait: checks to see if user name is passed in the url
    use UserNameVerifier;
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
        $this->theme = Config::get('app_parametters.theme');
        $this->contenttypeRepository = $contenttypeRepository;
        $this->resumeRepository = $resumeRepository;
    }

    public function index($userName=""){


        //$homeItem = $this->contenttypeRepository->getHomeItemByUserName($userName);
        /*if($version==null) {
            $version = $this->resumeRepository->defaultByUserName($userName)->version;
        }*/

        $user = $this->currentUserName($userName);

        try {
            $homeItem = $this->contenttypeRepository->getHomeItemByUserName($user);
            if($userName==""){
                return redirect($homeItem->url);
            }else{
                return redirect($userName ."/". $homeItem->url);
            }

        }catch (ModelNotFoundException $mnfe){
            abort(404);//return redirect()->home();
        }

    }

    public function home($userName=""){
        $user = $this->currentUserName($userName);

        try{
            //$bio = $this->biographyRepository->getDefaultBioByUserName($user);
            return view($this->theme . "home" . '.index')->with("isHome",true);
        }catch (ModelNotFoundException $ne){
            abort(404);
        }
    }

}
