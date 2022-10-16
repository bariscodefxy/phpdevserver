<?php

namespace bariscodefx\phpdevserver {

	require dirname(__DIR__, 1) . "../vendor/autoload.php";

	define('PREFIX', '[PHP DEV SERVER]');

	use Symfony\Component\Process\Exception\ProcessFailedException;
	use Symfony\Component\Process\Process;

	try {




		if ( !file_exists( "phpdevserver.config.yml" ) ) throw new \Exception('\'phpdevserver.config.yml\' file not found, are you sure about you are running in the project directory?');

		$process = new Process(
			[
				'php',

				'-S', @ConfigParser::get("ip") . ':' . @ConfigParser::get("port"),

				'-t', dirname(__DIR__, 1) . "/www"
			]
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