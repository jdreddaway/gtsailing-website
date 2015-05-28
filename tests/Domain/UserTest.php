<?php

use GTSailing\Domain\User;

class UserTest extends PHPUnit_Framework_TestCase {

  function testGetID() {
    $user = new User(57);
    $this->assertEquals(57, $user->getID());
  }
}

?>