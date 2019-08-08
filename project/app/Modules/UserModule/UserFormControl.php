<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\UserModule;

use App\FormFactory;
use App\IFormFactory;
use App\OwnFormRenderer;
use App\RenderUtils;
use Model\UserModel;
use Nette\Application\UI\Form;
use Nette\SmartObject;

/**
 * UserForm
 * @author Jan Pospisil
 */
class UserFormControl
{
	use SmartObject;

	private $formFactory;
	private $user;
	private $userModel;

	public function __construct(IFormFactory $formFactory, UserModel $userModel) {
		$this->formFactory = $formFactory;
		$this->userModel = $userModel;
	}

	public function create($user = null){
		$this->user = $user;
		$form = $this->formFactory->create();
		//RenderUtils::renderBootstrap($form);
		//$form->setRenderer(new OwnFormRenderer());
		$form->addText('name', 'Name')
			->setRequired()
			->setDefaultValue($user ? $user->name : null);
		//$form['name']->addError('Chyba jména');
		$form->addText('surname', 'Surname')
			->setRequired()
			->setDefaultValue($user ? $user->surname : null);
		$form->addSubmit('formsubmit', $user ? 'Save' : 'Create');
		$form->onSuccess[] = [$this, 'formSubmitted'];
		return $form;
	}
	public function formSubmitted(Form $form){

		if($this->user){
			$this->userModel->updateUser($this->user->id, $form->values->name, $form->values->surname);
		} else {
			$this->userModel->create($form->values->name, $form->values->surname);
			// tady

		}
	}
}
