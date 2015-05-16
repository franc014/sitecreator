<?php namespace App\Providers;

use App\Events\FileUploader;
use App\Events\RemoveFile;
use App\Events\SendEmail;
use App\Handlers\Events\FileUploaderHandler;
use App\Handlers\Events\RemoveFileHandler;
use App\Handlers\Events\SendEmailHandler;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\PopulateUserContentOptions;
use App\Handlers\Events\CreateUserContentOptions;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
		PopulateUserContentOptions::class=>[
			CreateUserContentOptions::class
		],
		FileUploader::class=>[
			FileUploaderHandler::class
		],
        RemoveFile::class=>[
            RemoveFileHandler::class
        ],
        SendEmail::class=>[
            SendEmailHandler::class
        ]
	];
	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
	}

}
