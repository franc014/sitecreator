<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\BiographyRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BioController extends Controller {
    private $theme;
    /**
     * @var BiographyRepository
     */
    private $biographyRepository;
    /**
     * @var Guard
     */
    private $auth;

    function __construct(BiographyRepository $biographyRepository,Guard $auth)
    {
        $this->theme = Config::get('pages.theme');
        $this->biographyRepository = $biographyRepository;
        $this->auth = $auth;
    }

    public function index($userName){
        try{
            $bio = $this->biographyRepository->getDefaultBioByUserName($userName);
            return view($this->theme . "acercade" . '.index')->with("biography",$bio);
        }catch (ModelNotFoundException $ne){
            abort(404);
        }
    }

}
