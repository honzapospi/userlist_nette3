<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\Bar;

use Nette\Application\UI\Form;
use Nette\SmartObject;
use Nette\Utils\Html;
use Tracy\IBarPanel;

/**
 * FormBar
 * @author Jan Pospisil
 */
class FormBar implements IBarPanel
{
	use SmartObject;
	private $forms;

	public function addForm(Form $form){
		$this->forms[] = $form;
	}

	function getTab() {
		return 'FORM';
	}

	function getPanel() {
		$div = Html::el('div');
		foreach ($this->forms as $form){
			$f = Html::el('div');
			$f->setText($form->getName(). ' - '.get_class($form));
			$div->addHtml($f);
		}
		return $div;
	}
}
