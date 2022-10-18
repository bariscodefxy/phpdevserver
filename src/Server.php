<?php

namespace bariscodefx\phpdevserver {

	define('PREFIX', '[PHP DEV SERVER]');

	use Symfony\Component\Process\Exception\ProcessFailedException;
	use Symfony\Component\Process\Process;
	use Symfony\Component\Filesystem\Filesystem;

	try {


		if ( !file_exists( "phpdevserver.config.yml" ) ) throw new \Exception('\'phpdevserver.config.yml\' file not found, are you sure about you are running in the project directory?');

		$filesystem = new Filesystem();
		$filesystem->exists(dirname(__DIR__, 1) . "/www/.phpdevserver.temp.config.txt");
		$filesystem->remove(dirname(__DIR__, 1) . "/www/.phpdevserver.temp.config.txt");
		$filesystem->touch(dirname(__DIR__, 1) . "/www/.phpdevserver.temp.config.txt");
		$filesystem->dumpFile(dirname(__DIR__, 1) . "/www/.phpdevserver.temp.config.txt", getcwd());

		$process = new Process(
			[
				'php',

				'-S', @ConfigParser::get("ip") . ':' . @ConfigParser::get("port"),

				'-t', dirname(__DIR__, 1) . "/www",

				dirname(__DIR__, 1) . "/www/router.php"
			],
			null,
			null,
			null,
			null,
		);
		$process->start();

		foreach ($process as $type => $data) {
		    echo PREFIX . " " . $data;
		}




	} catch(\Throwable $e)
	{
		echo $e->getMessage() . PHP_EOL;
		die();
	}

}