<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Client\SaleableRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class SaleableController extends Controller {

    /**
     * @var SaleableRepository
     */
    private $saleableRepository;
    private $theme;

    function __construct(SaleableRepository $saleableRepository)
    {
        $this->saleableRepository = $saleableRepository;
        $this->theme = Config::get('pages.theme');
    }

	public function index($username){
        $featuredSaleable = $this->saleableRepository->getFeaturedSaleable($username);
        if($featuredSaleable===null){
            return view($this->theme.'.productos_servicios'.'.index');
        }

        return redirect("/".$username."/productos_servicios/".$featuredSaleable->title."/".$featuredSaleable->id);


    }

    public function detail(){
        $theme = Config::get('pages.theme');
        return view($theme . 'productos_servicios._detail.index');
    }

}
