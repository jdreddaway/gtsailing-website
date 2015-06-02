<?php

use GTSailing\Domain\NotLoggedInException;

class NotLoggedInExceptionTest extends Tests\TestCase {

  function testConstruct() {
    $ex = new NotLoggedInException();
    $this->assertEquals("Nobody is currently logged in.", $ex->getMessage());
  }
}

?>