<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 11:28 AM
 */

namespace App\Http\ViewComposers;


use App\Category;
use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\Client\SaleableDetailRepository;
use App\Repositories\Client\SaleableRepository;
use App\Repositories\SaleablePriceRepository;
use App\Saleable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Psy\Exception\ErrorException;

class SaleableDetailComposer extends CurrentRoute{
    use UserNameVerifier;

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

            $urlUserName = $this->getRouteParameter('username');
            $user = $this->currentUserName($urlUserName);
            try{

                $saleable = $this->saleableRepository->getModelByTitle($user, $this->getRouteParameter('saleable'));

                $details = $this->saleableDetailRepository->getDetails($saleable->id, 0);
                $targets = $this->saleableDetailRepository->getDetails($saleable->id, 1);
                $ventages = $this->saleableDetailRepository->getDetails($saleable->id, 2);
                $prices = $this->saleablePriceRepository->getPriceList($saleable->id);
                $restSaleables = $this->saleableRepository->getSaleablesExcept($user, $saleable->id);
                $catSaleables = $this->saleableRepository->getCategories('saleables',$user,$saleable->id);


                //$restSaleables = $this->saleableRepository->getSaleablesExceptFiltered($user, $this->getRouteParameter('saleable_id'));
                /*$cats = Category::whereHas('saleables',function($q){
                    $q->where('user_id',88);
                })->with('saleables')->get()->toArray();

                $sals = Saleable::whereHas('categories',function($q){
                    $q->where('user_id',88);
                })->get()->toArray();
                $sals2 = collect([]);
                foreach($cats as $cat){
                    foreach($cat['saleables'] as $sa){
                        /*if($sa['id']!= $this->getRouteParameter('saleable_id')){
                            $sals2->push($sa);
                        }*/
                    //}
                //}


                /*$sales = collect([]);

                foreach($restSaleables as $sal){
                    foreach($sal->categories as $cat){
                        $sales->push($cat);
                    }
                }
                $unique = $sales->unique('name');
                dd($unique->values()->all());*/
                $data = [
                    "saleable" => $saleable,
                    "details" => $details,
                    "targets" => $targets,
                    "ventages" => $ventages,
                    "prices" => $prices,
                    "restsaleables" => $restSaleables,
                    "salcategories"=>$catSaleables

                ];
                return $view->with("data", $data);
            }catch(ModelNotFoundException $e){

                abort(404);
            }


    }


}