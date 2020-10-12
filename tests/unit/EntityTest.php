<?php

use CodeIgniter\Test\CIUnitTestCase;
use MGatner\PHPStan\Entities\Widget;

class EntityTest extends CIUnitTestCase
{
	public function testError()
	{
		$widget = new Widget();

		echo $widget->foo;
		$widget->bar = 'bam';
		$widget->baz = [
			'key' => 'value',
		];

		$this->assertTrue(true);
	}
}
