<?php namespace App\Http\Controllers\Site;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeadRequest;
use App\Repositories\Client\GuestRepository;


class GuestController extends Controller {


    /**
     * @var GuestRepository
     */
    private $guestRepository;

    function __construct(GuestRepository $guestRepository)
    {
        $this->guestRepository = $guestRepository;

    }

    public function storeLead(LeadRequest $leadRequest){
        $data = $leadRequest->all();
        $this->guestRepository->saveLead($data);
        session()->flash("flash-success-message","Pronto estaré comunicándome con usted");
        session()->flash("success-message-title","Gracias por contactarme.");
        return redirect()->back();
    }

}
