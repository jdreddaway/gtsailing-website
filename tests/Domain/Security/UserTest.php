<?php

namespace Tests\Domain\Security;

use GTSailing\Domain\Security\User;

class UserTest extends \Tests\TestCase {

  function testConstructor() {
    $user = new User(57);
    $this->assertEquals(57, $user->getID());
  }
}

?>