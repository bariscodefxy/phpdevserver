<?php

namespace bariscodefx\phpdevserver {

	use Symfony\Component\Yaml\Yaml;

	class ConfigParser {

		public static function get(string $name)
		{
			$file = Yaml::parseFile(getcwd() . '/phpdevserver.config.yml');
			if(isset($file[$name]))
				return $file[$name];
			else return null;
		}

	}

}