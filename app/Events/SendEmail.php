<?php namespace App\Events;

use App\Events\Event;

use App\Services\Mailers\Mailer;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Event {

	use SerializesModels;
    /**
     * @var Mailer
     */
    public $mailer;

    /**
     * Create a new event instance.
     *
     * @param Mailer $mailer
     */
	public function __construct(Mailer $mailer)
	{
		//
        $this->mailer = $mailer;
    }

}
