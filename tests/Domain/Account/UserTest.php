<?php

namespace Tests\Domain\Account;

use GTSailing\Domain\Account\User;

use Prophecy\Prophet;

use Tests\Repositories\Account\UserRepoTest;
use Tests\Domain\Facebook\FBUserTest;


class UserTest extends \Tests\TestCase {

  function testGetters() {
    $user = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $this->assertEquals(57, $user->getID());
    $this->assertEquals('firstname', $user->getFirstName());
    $this->assertEquals('lastname', $user->getLastName());
    $this->assertEquals('email', $user->getEmail());
    $this->assertEquals('phone', $user->getPhoneNumber());
  }

  function testAuthenticateByFBUser_Success() {
    $user = self::createAuthenticatedUser($this->prophet);
    $this->assertTrue($user->isAuthenticated());
  }

  function testAuthenticateByFBUser_Failure() {
    $user = UserRepoTest::createDefaultUser();
    $fbUser = FBUserTest::createNonQueryingFBUser($this->prophet);
    $user->authenticateByFBUser($fbUser);
    $this->assertFalse($user->isAuthenticated());
  }

  function testIsAuthenticatedInit() {
    $user = UserRepoTest::createDefaultUser();
    $this->assertFalse($user->isAuthenticated());
  }

  function testEquals_True() {
    $user1 = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $user2 = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $this->assertEqualsEquals($user1, $user2);
  }

  function testEquals_False() {
    $user1 = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $user2 = new User(67, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $this->assertNotEqualsEquals($user1, $user2);
  }

  function testToString() {
    $user = new User(57, 'firstname', 'lastname', 'email', 'phone', 'fb_id', 'hashed_password');
    $string = "" . $user;
    $this->assertEquals("user57", $string);
  }

  public function createAuthenticatedUser(Prophet $prophet) {
    $user = UserRepoTest::createDefaultUser();
    $fbUser = FBUserTest::createQueryingFBUser($prophet);
    $user->authenticateByFBUser($fbUser);
    return $user;
  }
}

?>