<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ResumeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class ResumeController extends Controller {


    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    private $theme;

    function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->theme = Config::get('pages.theme');
    }

    public function index($username,$version){

            $resume = $this->resumeRepository->getResumeAndSections($username);
            $data = ["resume" => $resume];
            return view($this->theme . 'resume' . '.index')->with("data",$data);

    }
}
