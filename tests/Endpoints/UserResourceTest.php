<?php

use GTSailing\Domain\User;
use GTSailing\Endpoints\UserResource;

class UserResourceTest extends PHPUnit_Framework_TestCase {

  function testUserConstructor() {
    $user = new User(57);
    $resource = new UserResource($user);
    $this->assertEquals(57, $resource->id);
  }
}

?>