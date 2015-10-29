<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ResumeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AboutController extends Controller {
    private $theme;
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;

    function __construct(ResumeRepository $resumeRepository)
    {
        $this->theme = Config::get('app_parametters.theme');
        $this->resumeRepository = $resumeRepository;
    }

    public function index($userName,$version){

        try {
        $bio = $this->resumeRepository->resumeByVersion($version)->biography;
        return view($this->theme . 'acercade' . '.index')->with(["bio"=>$bio]);
        }catch (ModelNotFoundException $mnfe){
            //dd($mnfe);
            abort(404);
        }
    }

}
