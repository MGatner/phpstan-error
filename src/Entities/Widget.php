<?php namespace MGatner\PHPStan\Entities;

use CodeIgniter\Entity;

class Widget extends Entity
{
	protected $casts = [
		'rank' => 'int',
	];

	/**
	 * Initial values.
	 *
	 * @var array
	 */
	protected $attributes = [
		'file' => '',
	];
}
