<?php declare(strict_types = 1);

namespace Thunbolt\Forms;

use Nette\Application\UI\Form;
use Nette\SmartObject;
use stdClass;
use Thunbolt\Flashes\IFlashes;
use Thunbolt\Forms\Factories\IFormFactory;

abstract class BaseForm {

	use SmartObject;

	/** @var IFlashes */
	private $flashes;

	/** @var IFormFactory */
	private $factory;

	/**
	 * @internal
	 */
	final public function inject_BaseForm(IFlashes $flashes, IFormFactory $factory) {
		$this->flashes = $flashes;
		$this->factory = $factory;
	}

	/**
	 * @return Form
	 */
	protected function createForm() {
		return $this->factory->create();
	}

	protected function flashMessage(string $message, string $type = 'success'): stdClass {
		return $this->flashes->flashMessage($message, $type);
	}

}
