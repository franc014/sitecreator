<?PHP
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/9/15
 * Time: 3:53 PM
 */

namespace App\Repositories;


use App\Contenttype;

class ContentypeRepository {

    /**
     * @var Contenttype
     */
    protected $model;

    function __construct(Contenttype $model)
    {
        $this->model = $model;
    }

    function getAll(){
        return $this->model->all();
    }

    public function getByTypeName($defaultHomePage)
    {
        return $this->model->where("type",$defaultHomePage)->first();
    }
    /*function create($data){
        $contentypes = $this->model->all();

    }*/
}