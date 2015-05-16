<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 7:26 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\Client\SaleableRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
class SaleablesComposer extends CurrentRoute{

    /**
     * @var SaleableRepository
     */
    private $saleableRepository;


    function __construct(SaleableRepository $saleableRepository)
    {
        $this->saleableRepository = $saleableRepository;
        $this->route = Route::current();
    }

    public function compose(View $view){
        try {
            $saleables = $this->saleableRepository->getAllByUserName($this->getRouteParameter('username'));
            $data = ["saleables" => $saleables, "username" => $this->getRouteParameter('username')];
            $view->with("data", $data);
        }catch (ModelNotFoundException $mnfe){
            abort(404);
        }
    }
}