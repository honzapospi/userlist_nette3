<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App;

use App\Bar\FormBar;
use Nette\Application\UI\Form;
use Nette\SmartObject;
use Tracy\Debugger;

/**
 * FormFactory
 * @author Jan Pospisil
 */
class FormFactory implements IFormFactory
{
	use SmartObject;

	public function create(): Form {
		$return = new Form();
		$return->getElementPrototype()->class('form');
		Debugger::getBar()->getPanel('form')->addForm($return);
		return $return;
	}
}
