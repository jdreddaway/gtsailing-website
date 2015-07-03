<?php

use GTSailing\Endpoints\BadRequestExceptionFactory;

class BadRequestExceptionFactoryTest extends Tests\TestCase {

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
   * @expectedExceptionMessage The following fields are missing and must be set: [hey, ho, whoh]
   */
  function testGetMessage() {
    $factory = new BadRequestExceptionFactory();
    $factory->throwMissingPostFieldsException(['hey', 'ho', 'whoh']);
  }

}