<?php

use GTSailing\Domain\Security\PasswordHasher;
use Tests\TestCase;

class PasswordHasherTest extends TestCase {

  function testHashing() {
    $hasher = new PasswordHasher();
    $hashed = $hasher->create_hash('something');

    $this->assertTrue($hasher->validate_password('something', $hashed));
    // TODO: password length is 109; need to make sure DB is correct
  }
}

?>