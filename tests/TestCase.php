<?php

namespace Tests;

use Prophecy\Prophet;

use Tests\DI\TestContainerBuilderFactory;

class TestCase extends \PHPUnit_Framework_TestCase {

  protected $prophet;
  protected $containerBuilder;

  protected function setup() {
    $this->prophet = new Prophet();
    $this->containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
  }

  protected function tearDown() {
    $this->prophet->checkPredictions();
  }

  protected function prophesize($className) {
    return $this->prophet->prophesize($className);
  }

  /**
   * @param array $expected
   * @param array $actual
   */
  protected function assertSetEquals($expected, $actual) {
    $strExpected = '[' . implode(', ', $expected) . ']';
    $strActual = '[' . implode(', ', $actual) . ']';
    $message = "Expected $strExpected but got $strActual.";
    $this->assertArraySubset($expected, $actual, false, $message);
    $this->assertArraySubset($actual, $expected, false, $message);
  }

  protected function assertEqualsEquals($expected, $actual) {
    if (!$expected->equals($actual)) {
      $this->fail("Expected $expected but got $actual.");
    }
  }

  protected function assertNotEqualsEquals($expected, $actual) {
    if ($expected->equals($actual)) {
      $this->fail("$actual should not equal $expected.");
    }
  }
}

?>