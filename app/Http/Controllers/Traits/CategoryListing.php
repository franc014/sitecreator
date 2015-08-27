<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 8/25/15
 * Time: 9:14 AM
 */

namespace App\Http\Controllers\Traits;


trait CategoryListing {
    public function listAllCategories(){
        $categories = $this->categoryRepository->allCategoriesByUserId($this->auth->user()->id);
        $data = ["categories"=>$categories,"meta"=>["message"=>"ok"]];
        return response($data,200);
    }
    public function listModelCategories($saleableId){
        $categories = $this->mainRepository->listModelCategoriesById($saleableId);
        $data = ["categories"=>$categories,"meta"=>["message"=>"ok"]];
        return response($data,200);
    }
}