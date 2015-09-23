<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 3/3/15
 * Time: 3:52 PM
 */

namespace App\Repositories;


use App\Price;

class SaleablePriceRepository extends DBRepository{


    /**
     * @var Target
     */
    protected $model;

    function __construct(Price $model)
    {
        $this->model = $model;
    }

    public function getPriceList($saleableId){
        return $this->model->where("saleable_id",$saleableId)->get();
    }
    public function getPriceListByTitle($title){
        return $this->model->where("title",$saleableId)->get();
    }


}