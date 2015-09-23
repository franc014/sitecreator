<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Client\SaleableRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class SaleableController extends Controller {
    use UserNameVerifier;
    /**
     * @var SaleableRepository
     */
    private $saleableRepository;
    private $theme;

    function __construct(SaleableRepository $saleableRepository)
    {
        $this->saleableRepository = $saleableRepository;
        $this->theme = Config::get('app_parametters.theme');
    }

	public function index($username=""){

        $user = $this->currentUserName($username);
        $featuredSaleable = $this->saleableRepository->getFeaturedSaleable($user);


        if($featuredSaleable===null){
            return view($this->theme.'.productos_servicios'.'.index');
        }

        if($username!=""){
            return redirect("/".$username."/".$featuredSaleable->tagtype."/".$featuredSaleable->slug);
        }else{
            return redirect("/".$featuredSaleable->tagtype."/".$featuredSaleable->slug);
        }

    }

    public function detail(){
        return view($this->theme . 'productos_servicios._detail.index');
    }

}
