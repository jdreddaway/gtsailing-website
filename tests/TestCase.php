<?php

namespace Tests;

use Prophecy\Prophet;

class TestCase extends \PHPUnit_Framework_TestCase {

  protected $prophet;

  protected function setup() {
    $this->prophet = new Prophet();
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
}

?>