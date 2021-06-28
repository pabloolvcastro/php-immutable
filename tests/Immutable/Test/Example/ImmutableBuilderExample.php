<?php


namespace Immutable\Test\Example;


use Immutable\ImmutableBuilder;

class ImmutableBuilderExample extends ImmutableBuilder {

	public function getObjetType(): string {
		return ImmutableObjectExample::class;
	}
}
