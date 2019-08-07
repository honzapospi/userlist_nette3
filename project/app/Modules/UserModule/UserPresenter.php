<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace App\UserModule\Presenters;
use Model\UserModel;
use Nette\Application\UI\Presenter;

/**
 * UserPresenter
 * @author Jan Pospisil
 */
final class UserPresenter extends Presenter
{
	private $userModel;

	public function __construct(UserModel $userModel) {
		$this->userModel = $userModel;
	}


	public function renderDefault(){
		$this->template->users = $this->userModel->getUsers();
	}

}
