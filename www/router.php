<?php

$cwd = file_get_contents(__DIR__ . "/.phpdevserver.temp.config.txt");

require __DIR__ . "/funcs.php";

$_SERVER["REQUEST_URI"] = str_replace("%20", " ", $_SERVER['REQUEST_URI']);
if($_SERVER["REQUEST_URI"] && $_SERVER["REQUEST_URI"] != "/")
{
	if( substr($_SERVER["REQUEST_URI"], -4) == ".php" )
	{
		include( $cwd . "/" .substr($_SERVER["REQUEST_URI"], 1) );
	} else {
		if( file_exists( substr($_SERVER["REQUEST_URI"], 1) ) )
		{
			echo file_get_contents($cwd . "/" .substr($_SERVER["REQUEST_URI"], 1));
		}
		else if( file_exists( $cwd . "/" . explode("?", substr($_SERVER["REQUEST_URI"], 1))[0] ) )
		{
			echo file_get_contents($cwd . "/" . explode("?", substr($_SERVER["REQUEST_URI"], 1))[0]);
		} else {
			route( $_SERVER["REQUEST_URI"] );
		}
	}
}
else if (!$_SERVER["REQUEST_URI"] || $_SERVER["REQUEST_URI"] == "/")
{
	if( file_exists( $cwd . "/index.php" ) )
	{
		include $cwd . "/index.php";
	} else if ( file_exists( $cwd . "/index.html" ) )
	{
		echo file_get_contents( $cwd . "/index.html" );
	}
}