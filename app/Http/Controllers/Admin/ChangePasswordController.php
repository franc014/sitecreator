<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PasswordChangeRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ChangePasswordController extends Controller {


    /**
     * @var UserRepository
     */
    private $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $id
     * @param PasswordChangeRequest $request
     */
    public function updatePassword($id, PasswordChangeRequest $request){
        $password = $request->get('password');
        $data = ["password"=>bcrypt($password)];
        $result = $this->userRepository->updateUser($id,$data);
        return Response::json($result,200);
    }

}
