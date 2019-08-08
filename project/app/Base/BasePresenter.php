<?php

/**
 * Copyright (c) Jan Pospisil (http://www.jan-pospisil.cz)
 */

namespace App;


use App\Layout\IMenuControlFactory;
use Nette\Application\UI\Presenter;

/**
 * BasePresenter
 * @author Jan Pospisil
 */
class BasePresenter extends Presenter
{
	/**
	 * @var IMenuControlFactory
	 */
	public $menuControlFactory;

	public function injectMenuControlFactory(IMenuControlFactory $menuControlFactory){
		$this->menuControlFactory = $menuControlFactory;
	}

	/**
	* @return \Nette\Application\UI\Control
	*/
	protected function createComponentMenu(){
	    $control = $this->menuControlFactory->create();
	    //$stop();
	    return $control;
	}
}
