<?php

abstract class Database
{
	/**
	 * @var string
	 */
	protected $bam = 'test';

	/**
	 * @var int
	 */
	protected $baz = 1;

	/**
	 * Accessor for properties if they exist.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function __get(string $key)
	{
		if (property_exists($this, $key))
		{
			return $this->$key;
		}

		return null;
	}

	/**
	 * Checker for properties existence.
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function __isset(string $key): bool
	{
		return property_exists($this, $key);
	}
}
