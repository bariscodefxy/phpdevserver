<?php

require dirname( __DIR__, 1 ) . "/vendor/autoload.php";

use bariscodefx\phpdevserver\ConfigParser;

function route(string $uri = "")
{
	$route = ConfigParser::get("route");
	if($route)
	{
		preg_match_all("/[\w]+=[\$][\d]+/", $route, $matches);
		foreach($matches[0] as $key => $h)
		{
			$matches[$key] = explode('=', $h);
		}
		foreach($matches as $key => $h)
		{
			$_GET[$h[0]] = parseURIstring($uri)[$key];
		}
		$file = explode("?", $route)[0];
		if( file_exists( getcwd() . "/" . $file ) )
		{
			include getcwd() . "/" . $file;
		}
	} else {
		echo "lol";
	}
}

function parseURIstring(string $string)
{
	$string = substr($string, 1);
	return explode("/", $string);
}