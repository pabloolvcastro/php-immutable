<?php


namespace Immutable;


abstract class ImmutableBuilder {
	protected $attributes = array();

	final protected function __construct() {
	}

	abstract public function getObjetType(): string;

	public function build() {
		$objectType = $this->getObjetType();
		return new $objectType($this);
	}

	public static function getBuilder(): ImmutableBuilder {
		return new static();
	}

	public function getAttributes(): array {
		return $this->attributes;
	}

	public final function __set(string $attributeName, $attributeValue): void {
		$this->attributes[$attributeName] = $attributeValue;
	}
}
