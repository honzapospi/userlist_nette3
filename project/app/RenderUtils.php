<?php

/**
 * Copyright (c) Jan Pospisil (https://www.jan-pospisil.cz)
 */

declare(strict_types=1);

namespace App;

use Nette\Application\UI\Form;
use Nette\Forms\Rendering\DefaultFormRenderer;
use Nette\StaticClass;

/**
 * RenderUtils
 * @author Jan Pospisil
 */
class RenderUtils
{
	use StaticClass;

	public static function renderBootstrap(Form $form){
		/**
		 * @var DefaultFormRenderer $renderer
		 */
		$renderer = $form->getRenderer();
		$renderer->wrappers['controls']['container'] = null;
		$renderer->wrappers['pair']['container'] = 'div class="form-group row"';
		$renderer->wrappers['pair']['.error'] = 'has-danger';
		$renderer->wrappers['control']['container'] = 'div class="col-sm-9"';
		$renderer->wrappers['label']['container'] = 'div class="col-sm-3 col form-label"';
		$renderer->wrappers['control']['description'] = 'span class=form-text';
		$renderer->wrappers['control']['errorcontainer'] = 'span class=form-control-feedback';

	}

}
