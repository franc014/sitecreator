<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 6:15 PM
 */

namespace App\Repositories\Client;


use App\Saleable;

class SaleableRepository {
    /**
     * @var Saleable
     */
    private $model;
    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(Saleable $model, UserRepository $userRepository)
    {
        $this->model = $model;
        $this->userRepository = $userRepository;
    }

    public function getFeaturedSaleable($userName){
        $user = $this->userRepository->getUserByUserName($userName);
        $saleableFeatured = $this->model->userId($user->id)
                                        ->where("featured",1)->first();
        return $saleableFeatured;
    }

    public function getAllByUserName($userName){
        $user = $this->userRepository->getUserByUserName($userName);
        //TODO: Pagination on all saleables
        $saleables = $this->model->userId($user->id)->get();
        return $saleables;
    }

    public function getSaleable($userName,$saleableId){
        $user = $this->userRepository->getUserByUserName($userName);
        $saleable = $this->model->userId($user->id)
                                ->whereId($saleableId)
                                ->firstOrFail();
        return $saleable;
    }

    public function getSaleablesExcept($userName,$saleableId){
        $user = $this->userRepository->getUserByUserName($userName);
        //TODO: Pagination on all saleables
        $saleables = $this->model->with("user")->userId($user->id)->where("id","<>",$saleableId)->get();
        return $saleables;
    }





}