<?php

use GTSailing\Domain\Account\User;
use GTSailing\Domain\Security\NotAuthenticatedException;
use GTSailing\Domain\Security\Session;

use Tests\Domain\Account\UserTest;
use Tests\Repositories\Account\UserRepoTest;


class SessionTest extends Tests\TestCase {

  function testLogUserIn_Authenticated() {
    $user = UserTest::createAuthenticatedUser($this->prophet);
    $session_arr = array();
    $session = new Session($session_arr);
    $session->logUserIn($user);
    $this->assertEquals($user, $session->getLoggedInUser());
  }

  function testLogUserIn_NotAuthenticated() {
    $user = UserRepoTest::createDefaultUser();
    $session_arr = array();
    $session = new Session($session_arr);

    try {
      $session->logUserIn($user);
      $this->fail();
    } catch (NotAuthenticatedException $ex) {
    }
  }

  function testUserIsLoggedIn_True() {
    $user = UserTest::createAuthenticatedUser($this->prophet);
    $session_arr = array();
    $session = new Session($session_arr);
    $session->logUserIn($user);
    $this->assertTrue($session->userIsLoggedIn());
  }

  function testUserIsLoggedIn_Initial() {
    $session_arr = array();
    $session = new Session($session_arr);
    $this->assertFalse($session->userIsLoggedIn());
  }

  /**
   * @expectedException GTSailing\Domain\Security\NotLoggedInException
   */
  function testGetLoggedInUser_NoUserLoggedIn() {
    $userProph = $this->prophesize('GTSailing\Domain\Security\User');
    $session_arr = array();
    $session = new Session($session_arr);
    $session->getLoggedInUser();
  }
}

?>