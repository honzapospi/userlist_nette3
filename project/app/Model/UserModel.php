<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace Model;

use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
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

	public function getUser(int $id){
		return $this->getUsers()->get($id);
	}

	public function updateUser(int $id, string $name, string $surname){
		$this->getUser($id)->update(['name' => $name, 'surname' => $surname]);
	}

	public function create(string $name, string $surname): ActiveRow {
		return $this->connection->table('user')->insert(['name' => $name, 'surname' => $surname]);
	}
}
