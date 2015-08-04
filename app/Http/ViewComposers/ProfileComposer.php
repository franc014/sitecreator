<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 4:26 PM
 */
namespace App\Http\ViewComposers;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\Client\ProfileRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

class ProfileComposer extends CurrentRoute{
    use UserNameVerifier;
    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    private $socialIcons = array();
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    private $version;

    function __construct(ProfileRepository $profileRepository, ContenttypeRepository $contenttypeRepository, ResumeRepository $resumeRepository)
    {   $this->resumeRepository = $resumeRepository;
        $this->route = Route::current();
        $this->profileRepository = $profileRepository;
        $socialIconsDefinition = Config::get("socialicons.icomoon");
        //$this->version = $this->resumeRepository->defaultByUserName($this->getRouteParameter('username'))->version;
        foreach($socialIconsDefinition as $iconName => $icoValue ){
            $this->socialIcons[$iconName] =$icoValue;
        }

        $this->contenttypeRepository = $contenttypeRepository;

    }

    public function compose(View $view){

        $urlUserName = $this->getRouteParameter('username');
        $user = $this->currentUserName($urlUserName);

        $profile = $this->profileRepository->getProfileByUserName($user);

        $socialItems = $this->getSocialItems($profile);
        $homeItem = $this->contenttypeRepository->getHomeItemByUserName($user);

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