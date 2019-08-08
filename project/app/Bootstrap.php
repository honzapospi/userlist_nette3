<?php

declare(strict_types=1);

namespace App;

use App\Bar\FormBar;
use Nette\Configurator;
use Tracy\Debugger;


class Bootstrap
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator;

		//$configurator->setDebugMode(); // enable for your remote IP
		$configurator->enableTracy();

		//Debugger::$productionMode = true;

		Debugger::$showLocation = true;


		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory(__DIR__ . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		Debugger::getBar()->addPanel(new FormBar(), 'form');

		$configurator->addConfig(__DIR__ . '/config/common.neon');
		//$configurator->addConfig(__DIR__ . '/config/local.neon');


		return $configurator;
	}
}
