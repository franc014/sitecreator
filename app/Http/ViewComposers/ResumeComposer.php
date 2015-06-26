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

    /**
     * @var ResumeRepository
     */
    private $resumeRepository;

    function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
        $this->route = Route::current();
    }

    public function compose(View $view){
        try {
            $resume = $this->resumeRepository->getResumeAndSections($this->getRouteParameter('username'));
            $data = ["resume" => $resume];
            $view->with("data",$data);
        }catch (ModelNotFoundException $mnfe){
            //dd($mnfe);
            abort(404);
        }
    }
}