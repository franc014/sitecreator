<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 7:26 PM
 */

namespace App\Http\ViewComposers;


use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\Client\SaleableRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
class SaleablesComposer extends CurrentRoute{
    use UserNameVerifier;
    use MetaInfoGetter;
    protected $userName;
    /**
     * @var SaleableRepository
     */
    private $saleableRepository;
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;


    function __construct(SaleableRepository $saleableRepository,ContenttypeRepository $contenttypeRepository)
    {
        $this->saleableRepository = $saleableRepository;
        $this->route = Route::current();
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function compose(View $view){
        try {
            $urlUserName = $this->getRouteParameter('username');
            $this->userName = $this->currentUserName($urlUserName);
            $saleables = $this->saleableRepository->getAllByUserName($this->userName);
            $categories = $this->saleableRepository->getCategories('saleables',$this->userName);
            $pageMetaInfo = $this->getPageMetaInfo();

            $data = ["saleables" => $saleables,
                     "username" => $this->userName,
                     "salcategories"=>$categories,
                     "page_meta_info"=>$pageMetaInfo];
            $view->with("data", $data);
        }catch (ModelNotFoundException $mnfe){
            abort(404);
        }
    }
}