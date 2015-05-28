<?php

use GTSailing\Endpoints\BadRequestException;

class BadRequestExceptionTest extends PHPUnit_Framework_TestCase {

  function testConstruct() {
    $exception = new BadRequestException("yolo");
    $this->assertEquals(404, $exception->getStatusCode());
    $this->assertEquals("yolo", $exception->getMessage());
  }
}

?>