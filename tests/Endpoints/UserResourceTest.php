<?php

use GTSailing\Domain\Account\User;
use GTSailing\Endpoints\UserResource;

class UserResourceTest extends PHPUnit_Framework_TestCase {

  function testUserConstructor() {
    //TODO test better
    $user = new User(57, 'first', 'last', 'email', 'phone', 117, 'hashedPassword');
    $resource = new UserResource($user);
    $this->assertEquals(57, $resource->id);
    $this->assertEquals('first', $resource->firstName);
    $this->assertEquals('last', $resource->lastName);
    $this->assertEquals('email', $resource->email);
    $this->assertEquals('phone', $resource->phone);
  }
}

?>