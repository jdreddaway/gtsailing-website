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
}

?>