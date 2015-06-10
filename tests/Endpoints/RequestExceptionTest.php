<?php

use GTSailing\Endpoints\RequestException;

class RequestExceptionTest extends PHPUnit_Framework_TestCase {

  function testGetStatusCode() {
    $exception = new RequestExceptionMock(413, "yolo");
    $this->assertEquals(413, $exception->getStatusCode());
    //assert body is set
  }

  function testGetMessage() {
    $exception = new RequestExceptionMock(413, "yolo");
    $this->assertEquals('yolo', $exception->getMessage());
  }

  function testGetPrevious() {
    $prev = new \Exception('haha');
    $ex = new RequestExceptionMock(413, 'yolo', $prev);
    $this->assertEquals($prev, $ex->getPrevious());
  }
}

class RequestExceptionMock extends RequestException {

  function __construct($statusCode, $message, $previous = null) {
    parent::__construct($statusCode, $message, $previous);
  }
}

?>