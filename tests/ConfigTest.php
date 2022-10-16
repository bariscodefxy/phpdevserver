<?php

use PHPUnit\Framework\TestCase;

use bariscodefx\phpdevserver\ConfigParser;

final class ConfigTest extends TestCase
{

    public function testfunctionget(): void
    {
    	$this->assertEquals(
    		'127.0.0.1',
    		ConfigParser::get('ip')
    	);
    }

}