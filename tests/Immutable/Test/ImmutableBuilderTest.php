<?php

namespace Immutable\Test;



use Immutable\ImmutableBuilder;
use Immutable\Test\Example\ImmutableBuilderExample;
use Immutable\Test\Example\ImmutableObjectExample;
use LogicException;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ImmutableBuilderTest extends TestCase {

	public function testImmutableBuilder_isNotInstantiable(): void {
		$reflectionClass = new ReflectionClass(ImmutableBuilder::class);
		$this->assertTrue($reflectionClass->isAbstract());
	}

	public function testImmutableBuilderGetBuilder_shouldReturnImmutableBuilderInstance() {
		$immutableBuilder = ImmutableBuilderExample::getBuilder();
		$this->assertInstanceOf(ImmutableBuilder::class, $immutableBuilder);
	}

	public function testImmutableBuilderBuild_shouldThrownLogicExceptionForInvalidBuild() {
		$this->expectException(LogicException::class);
		$builder = ImmutableBuilderExample::getBuilder();
		$builder->build();
	}

	public function testImmutableBuilderBuild_shouldReturnCorrectObject() {
		$builder = ImmutableBuilderExample::getBuilder();

		$expectedAttributeValue = 'value';
		$builder->attribute = $expectedAttributeValue ;

		$actual = $builder->build();

		$this->assertInstanceOf(ImmutableObjectExample::class, $actual);
		$this->assertInstanceOf($builder->getObjetType(), $actual);
		$this->assertEquals($expectedAttributeValue, $actual->getAttribute());
	}

	public function testImmutableBuilderBuild_hasPropertyExposedViaMagicSet() {
		$builder = ImmutableBuilderExample::getBuilder();

		$propertyName = 'attribute';
		$expectedAttributeValue = 'value';
		$builder->$propertyName = $expectedAttributeValue;
		$builderAttributes = $builder->getAttributes();

		$this->assertArrayHasKey($propertyName,$builderAttributes);
		$this->assertEquals($expectedAttributeValue,$builderAttributes[$propertyName]);
	}
}
