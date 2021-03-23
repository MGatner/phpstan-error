<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Model.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database.php';

$db    = new class extends Database {};
$model = new Model($db);

// Try to check a property
if (! empty($model->test))
{
	echo 'Yes' . PHP_EOL;
}
else
{
	echo 'No' . PHP_EOL;
}
