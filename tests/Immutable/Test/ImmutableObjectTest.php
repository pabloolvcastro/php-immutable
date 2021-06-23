<?php


namespace Immutable\Test;


use Immutable\ImmutableObject;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ImmutableObjectTest extends TestCase {

	public function testImmutableObject_isNotInstantiable(): void {
		$reflectionClass = new ReflectionClass(ImmutableObject::class);
		$this->assertTrue($reflectionClass->isAbstract());
	}
}
