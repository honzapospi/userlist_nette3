<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\UserModule;

use App\FormFactory;
use App\IFormFactory;
use Nette\SmartObject;

/**
 * UserForm
 * @author Jan Pospisil
 */
class UserForm
{
	use SmartObject;

	private $formFactory;

	public function __construct(IFormFactory $formFactory) {
		$this->formFactory = $formFactory;
	}

	public function createForm(){
		$form = $this->formFactory->create();
		$form->addText('name', 'Name')->setRequired();
		$form->addText('surname', 'Surname')->setRequired();
		$form->addSubmit('formsubmit', 'Send');
		$form->onSuccess[] = [$this, 'formSubmitted'];
		return $form;
	}
	public function formSubmitted(Nette\Application\UI\Form $form, Nette\Utils\ArrayHash $values){
		dumpe($values);
	}
}
