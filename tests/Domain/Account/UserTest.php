<?php

namespace Tests\Domain\Account;

use GTSailing\Domain\Account\User;

class UserTest extends \Tests\TestCase {

  function testGetters() {
    $user = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id');
    $this->assertEquals(57, $user->getID());
    $this->assertEquals('firstname', $user->getFirstName());
    $this->assertEquals('lastname', $user->getLastName());
    $this->assertEquals('email', $user->getEmail());
    $this->assertEquals('phone', $user->getPhoneNumber());
    $this->assertEquals('fb_id', $user->getFBID());
  }
}

?>