<?php declare(strict_types = 1);

namespace Thunbolt\Forms\Factories;

use Nette\Application\UI\Form;

interface IFormFactory {

	/**
	 * @return Form
	 */
	public function create();

}
