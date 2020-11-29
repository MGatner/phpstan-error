<?php

namespace MGatner\PHPStan;

class Autoloader
{
	/**
	 * Stores alias as key, original as value.
	 *
	 * @var array<string, string>
	 */
	protected $aliases = [
		'MGatner\PHPStan\Five' => 'MGatner\PHPStan\Fifty',
	];

	/**
	 * Register the loader with the SPL autoloader stack.
	 */
	public function register()
	{
		// http://php.net/manual/en/function.spl-autoload.php#78053
		spl_autoload_extensions('.php,.inc');

		// Prepend the PSR4 autoloader for maximum performance.
		spl_autoload_register([$this, 'loadClass'], true, true); // @phpstan-ignore-line
	}

	/**
	 * Loads the class file for a given class name or its alias.
	 *
	 * @param string $class The fully qualified class name.
	 *
	 * @return bool
	 */
	public function loadClass(string $class)
	{
		$class = trim($class, '\\');
		$class = str_ireplace('.php', '', $class);

		// Check if this class is an alias
		if (isset($this->aliases[$class]))
		{
			// Attempt to load the replacement instead, then alias it
			$replacement = $this->aliases[$class];
			if ($this->loadClass($replacement))
			{
				class_alias($replacement, $class, false);
				return true;
			}

			return false;
		}

		$file = __DIR__ . DIRECTORY_SEPARATOR . substr($class, strrpos($class, '\\') + 1) . '.php';
		return $this->includeFile($file);
	}

	/**
	 * @param string $file
	 *
	 * @return bool
	 */
	protected function includeFile(string $file)
	{
		if (is_file($file))
		{
			include_once $file;
			return true;
		}

		return false;
	}
}
