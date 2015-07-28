<?php

use GTSailing\Domain\Facebook\InvalidFBSessionException;

class InvalidFBSessionExceptionTest extends PHPUnit_Framework_TestCase {

  function testConstruct() {
    $ex = new InvalidFBSessionException('messageee');

    $this->assertEquals($ex->getMessage(), 'messageee');
  }
}


?>