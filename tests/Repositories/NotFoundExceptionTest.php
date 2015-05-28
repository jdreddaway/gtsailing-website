<?php

use GTSailing\Repositories\NotFoundException;

class NotFoundExceptionTest extends PHPUnit_Framework_TestCase { 

  function testConstruct() {
    $nfe = new NotFoundException('message');
    $this->assertEquals('message', $nfe->getMessage());
  }
}

?>