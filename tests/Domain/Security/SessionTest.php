<?php

use GTSailing\Domain\Security\Session;

class SessionTest extends Tests\TestCase {

  function testSetCurrentUser() {
    $userProph = $this->prophesize('GTSailing\Domain\Security\User');
    $session_arr = array();
    $session = new Session($session_arr);
    $session->logUserIn($userProph->reveal());

    $this->assertEquals($userProph->reveal(), $session_arr['user']);
  }

  function testGetLoggedInUser() {
    $userProph = $this->prophesize('GTSailing\Domain\Security\User');
    $session_arr = array('user' => $userProph->reveal());
    $session = new Session($session_arr);
    
    $this->assertEquals($userProph->reveal(), $session->getLoggedInUser());
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