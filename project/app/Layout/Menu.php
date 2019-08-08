<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\Layout;

use Nette\Application\UI\Control;
use Nette\SmartObject;

/**
 * Menu
 * @author Jan Pospisil
 */
class Menu extends Control
{
	use SmartObject;

	public function render(){
		$this->template->setFile(__DIR__.'/Menu.latte');
		$this->template->render();
	}

}
