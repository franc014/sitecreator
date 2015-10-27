<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 4/16/15
 * Time: 11:28 AM
 */

namespace App\Http\ViewComposers;



use App\Http\Controllers\Traits\UserNameVerifier;

use App\Repositories\GalleryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Contracts\View\View;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;


class ProjectDetailComposer extends CurrentRoute{
    use UserNameVerifier;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var GalleryRepository
     */
    private $galleryRepository;

    function __construct(ProjectRepository $projectRepository,GalleryRepository $galleryRepository)
    {

        $this->route = Route::current();

        $this->projectRepository = $projectRepository;
        $this->galleryRepository = $galleryRepository;
    }

    public function compose(View $view){

            $urlUserName = $this->getRouteParameter('username');
            $user = $this->currentUserName($urlUserName);
            try{
                $project = $this->projectRepository->getProjectByName($this->getRouteParameter('projectname'));
                $gallery = $this->galleryRepository->getAllByProjectId($project->id);
                $restOfProjects = $this->projectRepository->getAllByUserNameExcept($user,$project->id);

                $data = [
                    "project" => $project,
                    "gallery" => $gallery,
                    "restofprojects"=>$restOfProjects
                ];
                return $view->with("data", $data);
            }catch(ModelNotFoundException $e){
                abort(404);
            }


    }


}