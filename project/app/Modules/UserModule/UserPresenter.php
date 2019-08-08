<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace App\UserModule\Presenters;
use App\BasePresenter;
use App\Layout\IMenuControlFactory;
use App\Layout\MenuControl;
use Model\UserModel;
use Nette\Application\UI\Presenter;

/**
 * UserPresenter
 * @author Jan Pospisil
 */
final class UserPresenter extends BasePresenter
{
	private $userModel;

	public function __construct(UserModel $userModel) {
		$this->userModel = $userModel;
	}

	public function actionDefault(){

		//$this->getComponent('menu')->getComponent('aab')->setTitle('vvv');
		$this['menu']->setTitle('AAAAAA');
		$this['menu-a'];
		$this['menu-b'];
		$this['menu-c'];
		$this['menu-c-h'];
		//$this['menu']->addComponent();
		//dump($this->getComponents()->count());
		//$this['menu']['aaa']->setTitle('title');
		//$this['menu-aab']->setTitle('title');


//		$this['menu']->setTitle('BBBB');
//		$c = $this->menuControlFactory->create();
//		$c->setTitle('MOJE MENU');
//		$this->addComponent($c, 'menu');
//		dump($this->getComponents());
	}

	public function renderDefault(){
		$this->template->users = $this->userModel->getUsers();
	}

}
