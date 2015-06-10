<?php

use GTSailing\Repositories\DoesNotExistException;

class DoesNotExistExceptionTest extends PHPUnit_Framework_TestCase { 

  function testConstruct() {
    $nfe = new DoesNotExistException('message');
    $this->assertEquals('message', $nfe->getMessage());
  }
}

?>