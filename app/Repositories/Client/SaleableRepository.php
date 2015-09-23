<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/15/15
 * Time: 6:15 PM
 */

namespace App\Repositories\Client;


use App\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\DBRepository;
use App\Saleable;

class SaleableRepository extends DBRepository{
    /**
     * @var Saleable
     */
    protected $model;
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    function __construct(Saleable $model, UserRepository $userRepository,CategoryRepository $categoryRepository)
    {
        $this->model = $model;
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
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



    public function getSaleablesExcept($userName,$saleableId){
        $user = $this->userRepository->getUserByUserName($userName);
        //TODO: Pagination on all saleables
        $saleables = $this->model->with(['user','categories'])
            ->userId($user->id)->where("id","<>",$saleableId)->get();
        return $saleables;
    }

    /*public function getSaleablesExceptFiltered($userName,$saleableId){
        $cats = Category::whereHas('saleables',function($q){
                    $q->where('user_id',88);
                })->with('saleables')->get()->toArray();


                $sals2 = collect([]);
                foreach($cats as $cat){
                    foreach($cat['saleables'] as $sa){
                        if($sa['id']!= $saleableId){
                            $sals2->push($sa);
                        }
                    }
                }
        return $sals2;
    }*/



}