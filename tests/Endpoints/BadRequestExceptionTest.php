<?php

use GTSailing\Endpoints\BadRequestException;

class BadRequestExceptionTest extends PHPUnit_Framework_TestCase {

  function testConstruct() {
    $exception = new BadRequestException("yolo");
    $this->assertEquals(400, $exception->getStatusCode());
    $this->assertEquals("yolo", $exception->getMessage());
  }

  function testGetPrevious() {
    $prev = new \Exception("hey");
    $ex = new BadRequestException("yolo", $prev);
    $this->assertEquals($prev, $ex->getPrevious());
  }
}

?>