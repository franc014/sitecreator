<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 11:28 AM
 */

namespace App\Http\ViewComposers;


use App\Repositories\Client\SaleableDetailRepository;
use App\Repositories\Client\SaleableRepository;
use App\Repositories\SaleablePriceRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Psy\Exception\ErrorException;

class SaleableDetailComposer extends CurrentRoute{


    /**
     * @var SaleableDetailRepository
     */
    private $saleableDetailRepository;
    /**
     * @var SaleableRepository
     */
    private $saleableRepository;
    /**
     * @var SaleablePriceRepository
     */
    private $saleablePriceRepository;

    function __construct(SaleableRepository $saleableRepository,
                         SaleableDetailRepository $saleableDetailRepository,
                         SaleablePriceRepository $saleablePriceRepository
                         )
    {

        $this->route = Route::current();
        $this->saleableDetailRepository = $saleableDetailRepository;
        $this->saleableRepository = $saleableRepository;
        $this->saleablePriceRepository = $saleablePriceRepository;
    }

    public function compose(View $view){
            try{
                $saleable = $this->saleableRepository->getSaleable($this->getRouteParameter('username'), $this->getRouteParameter('saleable_id'));
                $details = $this->saleableDetailRepository->getDetails($this->getRouteParameter('saleable_id'), 0);
                $targets = $this->saleableDetailRepository->getDetails($this->getRouteParameter('saleable_id'), 1);
                $ventages = $this->saleableDetailRepository->getDetails($this->getRouteParameter('saleable_id'), 2);
                $prices = $this->saleablePriceRepository->getPriceList($this->getRouteParameter('saleable_id'));
                $restSaleables = $this->saleableRepository->getSaleablesExcept($this->getRouteParameter('username'), $this->getRouteParameter('saleable_id'));
                $data = [
                    "saleable" => $saleable,
                    "details" => $details,
                    "targets" => $targets,
                    "ventages" => $ventages,
                    "prices" => $prices,
                    "restsaleables" => $restSaleables
                ];
                return $view->with("data", $data);
            }catch(ModelNotFoundException $e){
                abort(404);
            }


    }


}