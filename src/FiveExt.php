<?php

namespace MGatner\PHPStan;

class FiveExt extends Five
{
	public function getNumber()
	{
		return $this->number + 100;
	}
}
