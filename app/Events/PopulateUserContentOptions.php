<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class PopulateUserContentOptions extends Event {

	use SerializesModels;
	/**
	 * @var
	 */
	public $user_id;

    /**
     * Create a new event instance.
     *
     * @param $user_id
     */
	public function __construct($user_id)
	{
		//
		$this->user_id = $user_id;
	}

}
