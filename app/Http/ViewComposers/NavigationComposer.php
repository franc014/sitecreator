<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/14/15
 * Time: 12:03 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\Client\ContenttypeRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class NavigationComposer extends CurrentRoute{
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
        $navigationItems = $this->contenttypeRepository
                                ->getAllContentItemsByUserName($this->getRouteParameter('username'));
        return $view->with("navItems",$navigationItems);
    }
}