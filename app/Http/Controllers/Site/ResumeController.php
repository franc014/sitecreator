<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ResumeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class ResumeController extends Controller {

    use UserNameVerifier;
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    private $theme;

    function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->theme = Config::get('app_parametters.theme');
    }

    public function index($username=""){

            $user = $this->currentUserName($username);

            $resume = $this->resumeRepository->getResumeAndSections($user);

            $data = ["resume" => $resume];
            return view($this->theme . 'resume' . '.index')->with("data",$data);

    }
}
