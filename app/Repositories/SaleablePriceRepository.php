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


}