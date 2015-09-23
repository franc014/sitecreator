<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/25/15
 * Time: 3:38 PM
 */

namespace App\Repositories\Client;

use App\Saleabledetail;

class SaleableDetailRepository {

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

    public function getDetailIcon($saleableId){
        $detail = $this->model->find($saleableId);
        return $detail->photo;
    }

    public function getDetails($saleableId,$type){
        $details = $this->model
                               ->where("saleable_id",$saleableId)
                               ->where("type",$type)
                               ->get();
        return $details;
    }
    public function getDetailsByTitle($title,$type){
        $details = $this->model
            ->where("title",$title)
            ->where("type",$type)
            ->get();
        return $details;
    }


}