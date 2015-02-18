<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;


class FileUploader extends Event {

	use SerializesModels;
	/**
	 * @var
	 */
	public $fileContents;
	/**
	 * @var
	 */
	public $storage;

	/**
	 * @var
	 */
	public $fileName;

	/**
	 * Create a new event instance.
	 *
	 * @param $fileContents
	 * @param $storage
	 * @param $fileName
	 */
	public function __construct($fileContents, $fileName)
	{
		$this->fileContents = $fileContents;
		$this->fileName = $fileName;
	}



}
