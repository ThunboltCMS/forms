<?php declare(strict_types = 1);

namespace Thunbolt\Forms\DI;

use Nette\DI\CompilerExtension;
use Thunbolt\Forms\BaseForm;
use Thunbolt\Forms\BaseFormControl;

final class FormsExtension extends CompilerExtension {

	public function beforeCompile() {
		$builder = $this->getContainerBuilder();

		foreach ($builder->findByType(BaseForm::class) as $definition) {
			$definition->addSetup('inject_BaseForm');
		}

		foreach ($builder->findByType(BaseFormControl::class) as $definition) {
			$definition->addSetup('inject_BaseFormControl');
		}
	}

}
