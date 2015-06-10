<?php

use GTSailing\Endpoints\NotFoundException;

class NotFoundExceptionTest extends PHPUnit_Framework_TestCase {

  function testConstruct() {
    $exception = new NotFoundException("yolo");
    $this->assertEquals(404, $exception->getStatusCode());
    $this->assertEquals("yolo", $exception->getMessage());
  }

  function testGetPrevious() {
    $prev = new \Exception("hey");
    $ex = new NotFoundException("yolo", $prev);
    $this->assertEquals($prev, $ex->getPrevious());
  }
}

?>