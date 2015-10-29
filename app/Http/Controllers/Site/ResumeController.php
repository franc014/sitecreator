<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\ViewComposers\MetaInfoGetter;
use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\ResumeRepository;
use App\Repositories\UsercontenttypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class ResumeController extends Controller {

    use UserNameVerifier;

    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    private $theme;
    protected $userName;
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;


    function __construct(ResumeRepository $resumeRepository,ContenttypeRepository $contenttypeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->theme = Config::get('app_parametters.theme');
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function index($username=""){

            $this->userName = $this->currentUserName($username);

            $resume = $this->resumeRepository->getResumeAndSections($this->userName);
            $pageMetaInfo = $this->contenttypeRepository->getPageMetainfo($this->userName,'user_resume');
            $data = ["resume" => $resume,"page_meta_info"=>$pageMetaInfo];
            return view($this->theme . 'resume' . '.index')->with("data",$data);

    }
}
