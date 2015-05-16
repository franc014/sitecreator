<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 6:48 PM
 */

namespace App\Repositories\Client;


use App\Usercontenttype;

class ContenttypeRepository {


    /**
     * @var Usercontenttype
     */
    private $usercontenttype;
    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(UserRepository $userRepository, Usercontenttype $usercontenttype)
    {
        $this->usercontenttype = $usercontenttype;
        $this->userRepository = $userRepository;
    }

    public function getAllContentItemsByUserName($userName){
        $user = $this->userRepository->getUserByUserName($userName);
        $userId = $user->id;
        $contents = $this->usercontenttype->where("user_id",$userId)
                              ->where("active",1)->get();
        return $contents;
    }

    public function getHomeItemByUserName($userName){
        $contents = $this->getAllContentItemsByUserName($userName);
        $homeItem = null;
        foreach($contents as $content){
            if($content->ashome ==1){
                $homeItem = $content;
            }
        }
        return $homeItem;
    }

}