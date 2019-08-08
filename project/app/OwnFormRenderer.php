<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App;

use Nette\Forms\Form;
use Nette\Forms\IFormRenderer;
use Nette\SmartObject;

/**
 * OwnFormRenderer
 * @author Jan Pospisil
 */
class OwnFormRenderer implements IFormRenderer
{
	use SmartObject;

	function render(Form $form): string {
		$r = '<form>';
		foreach ($form->getErrors() as $error) {
			$r .= $error;
		}
		foreach ($form->getControls() as $control){
			$r .= $control->getControl();
		}
		$r .= '</form>';
		return $r;
	}
}
