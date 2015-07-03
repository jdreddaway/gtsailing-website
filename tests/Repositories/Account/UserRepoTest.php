<?php

namespace Tests\Repositories\Account;

use GTSailing\Repositories\Account\UserRepo;

class UserRepoTest extends \Tests\TestCase {

  function testLoadByID() {
    $row = array(
      'id' => 57,
      'first_name' => 'firstname',
      'last_name' => 'lastname',
      'email' => 'emaill',
      'phone' => 'phone',
      'fb_id' => 2334512
    );

    $storeProph = $this->prophesize('GTSailing\Repositories\UserSqlStore');
    $storeProph->loadByID(57)->willReturn($row);

    $repo = new UserRepo($storeProph->reveal());
    $user = $repo->loadByID(57);

    $this->assertEquals(57, $user->getID());
    $this->assertEquals('firstname', $user->getFirstName());
    $this->assertEquals('lastname', $user->getLastName());
    $this->assertEquals('emaill', $user->getEmail());
    $this->assertEquals('phone', $user->getPhoneNumber());
    $this->assertEquals(2334512, $user->getFBID());
  }

  function testCreate() {
    $storeProph = $this->prophesize('GTSailing\Repositories\UserSqlStore');
    $storeProph->createUser('email@sup.com', 'first', 'last', 'phone', 'pass', 19898)->willReturn(57);

    $repo = new UserRepo($storeProph->reveal());
    $id = $repo->create('email@sup.com', 'first', 'last', 'phone', 'pass', 19898);
    $this->assertEquals(57, $id);
  }
}

?>