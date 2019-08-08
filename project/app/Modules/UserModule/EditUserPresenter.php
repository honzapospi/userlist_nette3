<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace App\UserModule\Presenters;

use App\UserModule\UserFormControl;
use JP\Composition\UI\Presenter;
use Model\UserModel;
use Nette\Application\BadRequestException;


/**
 * EditUserPresenter
 * @author Jan Pospisil
 */
class EditUserPresenter extends \Nette\Application\UI\Presenter {

	private $userFormControl;
	private $u;
	private $userModel;

	public function __construct(UserFormControl $userFormControl, UserModel $userModel) {
		$this->userFormControl = $userFormControl;
		$this->userModel = $userModel;
	}

	public function actionEdit(int $id){
		$this->u = $this->userModel->getUser($id);
		if(!$this->u){
			throw new BadRequestException();
		}
		$this->setView('create');
	}

	/**
	* @return Nette\Application\UI\Control
	*/
	protected function createComponentUserForm(){
	    $form = $this->userFormControl->create($this->u);
	    $form->onSuccess[] = function (){
		    $this->flashMessage($this->u ? 'Updated' : 'Created');
		    $this->redirect($this->u ? 'User:default' : 'this');
	    };
	    return $form;
	}
}
