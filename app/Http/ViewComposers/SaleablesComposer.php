<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 7:26 PM
 */

namespace App\Http\ViewComposers;


use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\Client\SaleableRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
class SaleablesComposer extends CurrentRoute{
    use UserNameVerifier;

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
            $urlUserName = $this->getRouteParameter('username');
            $user = $this->currentUserName($urlUserName);

            $saleables = $this->saleableRepository->getAllByUserName($user);
            $data = ["saleables" => $saleables, "username" => $user];
            $view->with("data", $data);
        }catch (ModelNotFoundException $mnfe){
            abort(404);
        }
    }
}