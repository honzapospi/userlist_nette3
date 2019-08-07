<?php

declare(strict_types=1);

namespace App\Presenters;

use App\IFormFactory;
use Nette;
use Tracy\Debugger;


final class HomepagePresenter extends Nette\Application\UI\Presenter {

	private $context;
	private $formFactory;

	public function __construct(IFormFactory $formFactory, Nette\Database\Context $context) {
		$this->formFactory = $formFactory;
		$this->context = $context;
	}

	public function renderDefault(){
		$this->redirect(':User:User:default');
	}

}



