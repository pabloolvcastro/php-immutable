<?php


namespace Immutable;


use LogicException;

abstract class ImmutableObject {

	final public function __construct(ImmutableBuilder $builder) {
		$isValid = $this->isBuilderValid($builder);

		if ($isValid === false) {
			throw new LogicException("Invalid");
		}

		$attributes = $builder->getAttributes();
		foreach ($attributes as $name => $value) {
			$this->$name = $value;
		}
	}

	abstract protected function isBuilderValid(ImmutableBuilder $builder): bool;
}
