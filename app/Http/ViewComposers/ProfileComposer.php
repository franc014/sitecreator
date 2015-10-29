<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/13/15
 * Time: 4:26 PM
 */
namespace App\Http\ViewComposers;

use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\BiographyRepository;
use App\Repositories\Client\ContenttypeRepository;
use App\Repositories\Client\ProfileRepository;
use App\Repositories\ResumeRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

class ProfileComposer extends CurrentRoute{
    use UserNameVerifier;
    use MetaInfoGetter;
    protected $userName;
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
    /**
     * @var BiographyRepository
     */
    private $biographyRepository;

    function __construct(ProfileRepository $profileRepository,
                         ContenttypeRepository $contenttypeRepository,
                         ResumeRepository $resumeRepository,
                         BiographyRepository $biographyRepository)
    {   $this->resumeRepository = $resumeRepository;
        $this->route = Route::current();
        $this->profileRepository = $profileRepository;
        $socialIconsDefinition = Config::get("socialicons.icomoon");
        //$this->version = $this->resumeRepository->defaultByUserName($this->getRouteParameter('username'))->version;
        foreach($socialIconsDefinition as $iconName => $icoValue ){
            $this->socialIcons[$iconName] =$icoValue;
        }

        $this->contenttypeRepository = $contenttypeRepository;

        $this->biographyRepository = $biographyRepository;
    }

    public function compose(View $view){

        $urlUserName = $this->getRouteParameter('username');
        $this->userName = $this->currentUserName($urlUserName);


        $profile = $this->profileRepository->getProfileByUserName($this->userName);

        $socialItems = $this->getSocialItems($profile);
        $homeItem = $this->contenttypeRepository->getHomeItemByUserName($this->userName);

        $bio = $this->biographyRepository->getDefaultBioByUserName($this->userName);

        $pageMetaInfo = $this->getPageMetaInfo();

        $data = ["page_meta_info"=>$pageMetaInfo,"home_item"=>$homeItem,"profile"=>$profile,"socialitems"=>$socialItems,"biography"=>$bio];
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