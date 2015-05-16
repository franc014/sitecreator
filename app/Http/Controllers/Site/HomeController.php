<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Client\ContenttypeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HomeController extends Controller {


    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;

    function __construct(ContenttypeRepository $contenttypeRepository)
    {
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function index($userName){
        try {
            $homeItem = $this->contenttypeRepository->getHomeItemByUserName($userName);
            return redirect($userName . "/" . $homeItem->url);
        }catch (ModelNotFoundException $mnfe){
            return redirect()->home();
        }
    }

}
