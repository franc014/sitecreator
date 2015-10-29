<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/14/15
 * Time: 12:03 PM
 */

namespace App\Http\ViewComposers;


use App\Http\Controllers\Traits\UserNameVerifier;
use App\Repositories\Client\ContenttypeRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class NavigationComposer extends CurrentRoute{
    use UserNameVerifier;
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;

    function __construct(ContenttypeRepository $contenttypeRepository)
    {
        $this->contenttypeRepository = $contenttypeRepository;
        $this->route = Route::current();
    }

    public function compose(View $view){
        $urlUserName = $this->getRouteParameter('username');

        $user = $this->currentUserName($urlUserName);
        $navigationItems = $this->contenttypeRepository
                                ->getAllContentItemsByUserName($user);
        return $view->with("navItems",$navigationItems);
    }
}