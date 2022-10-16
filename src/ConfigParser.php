<?php

namespace bariscodefx\phpdevserver {

	use Symfony\Component\Yaml\Yaml;

	class ConfigParser {

		public static function get(string $name)
		{
			$file = Yaml::parseFile('phpdevserver.config.yml');
			if(!$file[$name]) throw new \Exception("'$name' was not found on the config file.");
			return $file[$name];
		}

	}

}