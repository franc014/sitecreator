<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/25/15
 * Time: 3:38 PM
 */

namespace App\Repositories;

use App\Saleabledetail;

class SaleableDetailRepository extends DBRepository{

    /**
     * @var SaleableDetail
     */
    protected $model;

    /**
     * @param SaleableDetail $model
     */
    function __construct(SaleableDetail $model)
    {
        $this->model = $model;
    }




}