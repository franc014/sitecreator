<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 4:26 PM
 */
namespace App\Http\ViewComposers;

use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\Client\ProfileRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

class ProfileComposer extends CurrentRoute{
    //Trait to extract from the route the username of queried user
    //use UrlUserParams;
    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    private $socialIcons = array();
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;

    function __construct(ProfileRepository $profileRepository, ContenttypeRepository $contenttypeRepository)
    {
        $this->profileRepository = $profileRepository;
        $socialIconsDefinition = Config::get("socialicons.icomoon");
        foreach($socialIconsDefinition as $iconName => $icoValue ){
            $this->socialIcons[$iconName] =$icoValue;
        }
        $this->route = Route::current();
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function compose(View $view){
        $profile = $this->profileRepository->getProfileByUserName($this->getRouteParameter('username'));
        $socialItems = $this->getSocialItems($profile);
        $homeItem = $this->contenttypeRepository->getHomeItemByUserName($this->getRouteParameter('username'));
        $data = ["home_item"=>$homeItem,"profile"=>$profile,"socialitems"=>$socialItems];
        $view->with("data",$data);
    }

    private function getSocialItems($profile){
        $socialIconsCodes = $this->getSocialIcons();
        //dd($socialIconsCodes);
        $socialItems = array();
        $socialAccounts = [
            "facebook"=>$profile->facebook,
            "twitter"=>$profile->twitter,
            "tumblr"=>$profile->tumblr,
            "pinterest"=>$profile->pinterest,
            "gplus"=>$profile->gplus,
            "dribbble"=>$profile->dribbble,
            "youtube"=>$profile->youtube,
            "picassa"=>$profile->picassa,
            "github"=>$profile->github,
            "vimeo"=>$profile->vimeo,
            "instagram"=>$profile->instagram,
            "flickr"=>$profile->flickr,
            "linkedin"=>$profile->linkedin,
            "treehouse"=>$profile->treehouse
        ];

        foreach($socialAccounts as $socialAccount =>$account){
            //dd($socialAccount);
            if($account!=""){
                $socialItems[] = array(["icon"=>$socialIconsCodes["$socialAccount"], "account"=>$account,"social"=>$socialAccount]);
            }
        }
        return $socialItems;

    }

    /**
     * @return mixed
     */
    public function getSocialIcons()
    {
        return $this->socialIcons;
    }
}