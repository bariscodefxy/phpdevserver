<?php

namespace bariscodefx\phpdevserver {

	require dirname(__DIR__, 1) . "../vendor/autoload.php";

	define('PREFIX', '[PHP DEV SERVER]');

	use Symfony\Component\Process\Exception\ProcessFailedException;
	use Symfony\Component\Process\Process;

	$process = new Process(['php', '-S', '127.0.0.1:8080', '-t', dirname(__DIR__, 1) . "/www"]);
	$process->start();

	foreach ($process as $type => $data) {
	    echo PREFIX . " " . $data;
	}

}