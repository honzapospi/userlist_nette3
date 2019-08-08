<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$app = App\Bootstrap::boot()
	->createContainer()
	->getByType(Nette\Application\Application::class);
//$app->catchExceptions = TRUE;

$app->run();
