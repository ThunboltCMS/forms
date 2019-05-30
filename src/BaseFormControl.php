<?php declare(strict_types = 1);

namespace Thunbolt\Forms;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\SmartObject;
use Thunbolt\Forms\Factories\IFormFactory;

abstract class BaseFormControl extends Control {

	use SmartObject;

	/** @var IFormFactory */
	private $factory;

	/**
	 * @internal
	 */
	final public function inject_BaseFormControl(IFormFactory $factory): void {
		$this->factory = $factory;
	}

	/**
	 * @return Form||\App\Forms\Form
	 */
	protected function createForm() {
		return $this->factory->create();
	}

	abstract protected function templateFile(): string;

	abstract protected function createComponentForm(): Form;

	public function render(): void {
		$template = $this->getTemplate();
		$template->setFile($this->templateFile());

		$template->form = $this->getComponent('form');

		$template->render();
	}

}
