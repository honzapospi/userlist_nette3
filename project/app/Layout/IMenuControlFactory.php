<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\Layout;

/**
 * IMenuControlFactory
 * @author Jan Pospisil
 */
interface IMenuControlFactory
{

	/**
	 * @return Menu
	 */
	public function create(): Menu;

}
