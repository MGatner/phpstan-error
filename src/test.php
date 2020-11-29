<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Try to get the class we are intercepting
$instance = new \MGatner\PHPStan\Five();

echo get_class($instance) . PHP_EOL;
echo $instance->getNumber() . PHP_EOL;

// Try to get the extended version
$instance2 = new \MGatner\PHPStan\FiveExt();

echo get_class($instance2) . PHP_EOL;
echo $instance2->getNumber() . PHP_EOL;
