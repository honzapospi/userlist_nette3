<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace Model;

use Nette\Database\Context;
use Nette\SmartObject;

/**
 * UserModel
 * @author Jan Pospisil
 */
class UserModel
{
	use SmartObject;

	private $connection;

	public function __construct(Context $context) {
		$this->connection = $context;
	}

	public function getUsers(){
		return $this->connection->table('user');
	}
}
