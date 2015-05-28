<?php

use GTSailing\Endpoints\RequestExceptionFactory;

class RequestExceptionFactoryTest extends PHPUnit_Framework_TestCase {

  function testCreateBadArgument() {
    $factory = new RequestExceptionFactory();
    $exception = $factory->createBadArgument('message');
    $this->assertEquals('message', $exception->getMessage());
  }
}

?>