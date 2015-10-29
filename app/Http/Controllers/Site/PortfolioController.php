<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class PortfolioController extends Controller {

    use UserNameVerifier;

    private $theme;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;

    function __construct(ProjectRepository $projectRepository,ContenttypeRepository $contenttypeRepository)
    {
        $this->theme = Config::get('app_parametters.theme');
        $this->projectRepository = $projectRepository;
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function index($username=""){
        $user = $this->currentUserName($username);
        $portfolio = $this->projectRepository->getAllByUserName($user);
        $categories = $this->projectRepository->getCategories('projects',$user);
        $pageMetaInfo = $this->contenttypeRepository->getPageMetainfo($user,'portafolio');
        $data = ["page_meta_info"=>$pageMetaInfo,"portfolio" => $portfolio,
            "username"=>$user,"portfoliocategories"=>$categories];
        return view($this->theme . 'portfolio' . '.index')->with("data",$data);

    }
    public function detail(){
        return view($this->theme . 'portfolio._detail.index');
    }
}
