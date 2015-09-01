<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    function __construct(ProjectRepository $projectRepository)
    {
        $this->theme = Config::get('app_parametters.theme');
        $this->projectRepository = $projectRepository;
    }

    public function index($username=""){
        $user = $this->currentUserName($username);
        $portfolio = $this->projectRepository->getAllByUserName($user);
        $categories = $this->projectRepository->getCategories('projects',$user);
        $data = ["portfolio" => $portfolio,
            "username"=>$user,"portfoliocategories"=>$categories];
        return view($this->theme . 'portfolio' . '.index')->with("data",$data);

    }
    public function detail(){
        return view($this->theme . 'portfolio._detail.index');
    }
}
