<?php


namespace Immutable\Test\Example;


use Immutable\ImmutableBuilder;
use Immutable\ImmutableObject;

class ImmutableObjectExample extends ImmutableObject {

	protected $attribute;

	public function getAttribute(): string {
		return $this->attribute;
	}

	protected function isBuilderValid(ImmutableBuilder $builder): bool {
		$builderAttributes = $builder->getAttributes();

		if (array_key_exists('attribute', $builder->getAttributes()) === false) {
			return false;
		}

		return is_null($builderAttributes['attribute']) === false;
	}
}
