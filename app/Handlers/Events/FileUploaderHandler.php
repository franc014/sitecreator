<?php namespace App\Handlers\Events;

use App\Events\FileUploader;

use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Illuminate\Contracts\Filesystem\Filesystem as Filesystem;
use Illuminate\Support\Facades\Response;

class FileUploaderHandler {
    /**
     * @var Filesystem
     */
    private $filesystem;


    /**
     * Create the event handler.
     *
     * @param Filesystem $filesystem
     * @internal param Filesystem $factory
     */
	public function __construct(Filesystem $filesystem)
	{
        $this->filesystem = $filesystem;
    }

	/**
	 * Handle the event.
	 *
	 * @param  FileUploader  $event
	 * @return void
	 */
	public function handle(FileUploader $event)
	{
		$fileContents = $event->fileContents;
		$fileName = $event->fileName;
        try{
            //TODO: pass file visibility, for now all public
		    $this->filesystem->put($fileName,$fileContents,'public');
            //return true;
        }catch (Exception $e){
            //return Response::json($e->getMessage(),404);
            return $e->getMessage();
        }
	}

}
