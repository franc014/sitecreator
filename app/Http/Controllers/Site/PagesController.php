<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Client\SaleableRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PagesController extends Controller {

    private $theme;

    function __construct()
    {
        $this->theme = Config::get('app_parametters.theme');
    }

    /*public function index($userName,$version, $page){
        //dd($version."f");
        try {
            if ($page == "productos_servicios") {
                return $this->indexService($userName);
            }
            return view($this->theme . $page . '.index');
        }catch (\InvalidArgumentException $iae){
            return redirect()->home();
        }
    }

    public function indexService($userName){
        $featuredSaleable = $this->saleableRepository->getFeaturedSaleable($userName);
        if($featuredSaleable===null){
            return view($this->theme.'.productos_servicios'.'.index');
        }

        return redirect("/".$userName."/productos_servicios/".$featuredSaleable->title."/".$featuredSaleable->id);
    }*/

    public function contacto($userName=""){
        return view($this->theme . "contacto" . '.index');
    }



}
