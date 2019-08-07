<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter {

	private $context;

	public function __construct(Nette\Database\Context $context) {
		$this->context = $context;
	}

	public function renderDefault(){
		$this->template->users = $this->context->table('user');
	}

	/**
	 * @return \Nette\Application\UI\Control
	 */
	protected function createComponentUserForm(){
		$form = new Nette\Application\UI\Form();
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



