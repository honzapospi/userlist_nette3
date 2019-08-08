<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App;

use Latte\CompileException;
use Nette\DI\CompilerExtension;
use Nette\SmartObject;

/**
 * ModelExtension
 * @author Jan Pospisil
 */
class ModelExtension extends CompilerExtension
{
	use SmartObject;

	public function loadConfiguration() {
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig();
		foreach ($config as $name => $value){
			$r = new \ReflectionClass($value);
//			if(!$r->implementsInterface('IModel')){
//				throw new CompileException('Each model must implement interface IModel');
//			}
		}
	}

}
