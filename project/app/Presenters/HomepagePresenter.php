<?php

declare(strict_types=1);

namespace App\Presenters;

use App\IFormFactory;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter {

	private $context;
	private $formFactory;

	public function __construct(IFormFactory $formFactory, Nette\Database\Context $context) {
		$this->formFactory = $formFactory;
		$this->context = $context;
	}

	public function renderDefault(){
		$this->template->users = $this->context->table('user');
	}

	/**
	 * @return \Nette\Application\UI\Control
	 */
	protected function createComponentUserForm(){
		$form = $this->formFactory->create();
		$form->addText('name', 'Name')->setRequired();
		$form->addText('surname', 'Surname')->setRequired();
		$form->addSubmit('formsubmit', 'Send');
		$form->onSuccess[] = [$this, 'formSubmitted'];
		return $form;
	}

	public function formSubmitted(Nette\Application\UI\Form $form, Nette\Utils\ArrayHash $value){
		dumpe($value);
	}

}



