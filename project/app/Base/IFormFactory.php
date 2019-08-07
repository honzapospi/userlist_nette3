<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App;

use Nette\Application\UI\Form;

/**
 * Form
 * @author Jan Pospisil
 */
interface IFormFactory
{
	/**
	 * @return Form
	 */
	public function create(): Form;

}
