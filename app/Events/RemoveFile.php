<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class RemoveFile extends Event {

	use SerializesModels;
    /**
     * @var
     */
    public $path;


    /**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($path)
	{
		//
        $this->path = $path;
    }

}
