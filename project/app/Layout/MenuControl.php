<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App\Layout;

use Nette\Application\UI\Control;
use Nette\ComponentModel\IComponent;
use Nette\SmartObject;
use Nette\Utils\Html;
use function Sodium\add;

/**
 * MenuControl.php
 * @author Jan Pospisil
 */
class MenuControl extends Control
{
	use SmartObject;

	private $title;

	/**
	 * @param mixed $title
	 */
	public function setTitle($title): void {
		$this->title = $title;
	}

	public function toString(){
		$el = Html::el('div');
		$el->setAttribute('style', 'border: 1px solid red; padding: 10px');
		$el->addText($this->getName());
		foreach ($this->getComponents() as $c){
			$el->addText($c->toString());
		}
		return $el;
	}

	public function render(): void {
		echo $this->toString();
	}

	protected function createComponent(string $name): ?IComponent {
		return new MenuControl();
	}

}
