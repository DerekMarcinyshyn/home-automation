<?php namespace HomeAutomation\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Phue\Client;

class PhilipsHue extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'home:phue';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Test the Philips Hue API.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('Hello Philips Hue');

		$client = new Client('192.168.1.197', 'newdeveloper');

		$light = $client->getLights()[1];
		$light->setOn(true);
		$light->setBrightness(150);
	}
}
