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

}



