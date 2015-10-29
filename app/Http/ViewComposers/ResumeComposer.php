<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 6/22/15
 * Time: 5:00 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\ResumeRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ResumeComposer extends CurrentRoute{
    use MetaInfoGetter;
    /**
     * @var ResumeRepository
     */
    private $resumeRepository;
    /**
     * @var ContenttypeRepository
     */
    private $contenttypeRepository;

    function __construct(ResumeRepository $resumeRepository,ContenttypeRepository $contenttypeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->route = Route::current();
        $this->contenttypeRepository = $contenttypeRepository;
    }

    public function compose(View $view){
        $pageMetaInfo = $this->getPageMetaInfo();
        try {
            $resume = $this->resumeRepository->getResumeAndSections($this->getRouteParameter('username'));
            $data = ["resume" => $resume,"page_meta_info"=>$pageMetaInfo];
            $view->with("data",$data);
        }catch (ModelNotFoundException $mnfe){
            //dd($mnfe);
            abort(404);
        }
    }
}