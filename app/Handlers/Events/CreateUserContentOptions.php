<?php namespace App\Handlers\Events;

use App\Events\PopulateUserContentOptions;

use App\Repositories\ProfileRepository;
use App\Repositories\UsercontenttypeRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class CreateUserContentOptions {
	/**
	 * @var UsercontenttypeRepository
	 */
	private $usercontenttypeRepository;
    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    /**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(UsercontenttypeRepository $usercontenttypeRepository, ProfileRepository $profileRepository)
	{
		//
		$this->usercontenttypeRepository = $usercontenttypeRepository;
        $this->profileRepository = $profileRepository;
    }

	/**
	 * Handle the event.
	 *
	 * @param  PopulateUserContentOptions  $event
	 * @return void
	 */
	public function handle(PopulateUserContentOptions $event)
	{
		$this->usercontenttypeRepository->create($event->user_id);
        $this->profileRepository->create($event->user_id);
	}

}
