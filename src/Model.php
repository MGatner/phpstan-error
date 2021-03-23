<?php

class Model
{
	/**
	 * @var string
	 */
	protected $foo = 'foo';

	/**
	 * @var int
	 */
	protected $bar = 42;

	/**
	 * @var Database
	 */
	protected $db;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function __get(string $name)
	{
		if (property_exists($this, $name))
		{
			return $this->$name;
		}

		if (isset($this->db->$name))
		{
			return $this->db->$name;
		}

		return null;
	}

	/**
	 * Checks for the existence of properties across this model, and db connection.
	 *
	 * @param string $name Name
	 *
	 * @return boolean
	 */
	public function __isset(string $name): bool
	{
		if (property_exists($this, $name))
		{
			return true;
		}

		return isset($this->db->$name);
	}
}
