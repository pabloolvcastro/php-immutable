<?php


namespace Immutable\Test\Example;


use Immutable\ImmutableBuilder;

class ImmutableBuilderExample extends ImmutableBuilder {

	public function withAttribute(string $attribute): ImmutableBuilderExample {
		$this->setAttribute('attribute', $attribute);
		return $this;
	}

	public function getObjetType(): string {
		return ImmutableObjectExample::class;
	}
}
