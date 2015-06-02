<?php

use GTSailing\Mills\LoginMill;
use GTSailing\Domain\NotLoggedInException;

class LoginMillTest extends Tests\TestCase {

  function testLoginByFBAccessToken() {
    $userProph = $this->prophesize('GTSailing\Domain\User');

    $userMillProph = $this->prophesize('GTSailing\Mills\UserMill');
    $userMillProph->getUserByFBAccessToken('super_super_token')->willReturn($userProph->reveal());

    $sessionProph = $this->prophesize('GTSailing\Domain\Session');
    $sessionProph->logUserIn($userProph->reveal())->shouldBeCalled();

    $sessionRepoProph = $this->prophesize('GTSailing\Repositories\SessionRepo');
    $sessionRepoProph->getSession()->willReturn($sessionProph->reveal());

    $mill = new LoginMill($sessionRepoProph->reveal(), $userMillProph->reveal());
    $mill->loginByFBAccessToken('super_super_token');
  }

  function testGetLoggedInUser_UserLoggedIn() {
    $userProph = $this->prophesize('GTSailing\Domain\User');

    $userMillProph = $this->prophesize('GTSailing\Mills\UserMill');

    $sessionProph = $this->prophesize('GTSailing\Domain\Session');
    $sessionProph->getLoggedInUser()->willReturn($userProph->reveal());

    $sessionRepoProph = $this->prophesize('GTSailing\Repositories\SessionRepo');
    $sessionRepoProph->getSession()->willReturn($sessionProph->reveal());

    $mill = new LoginMill($sessionRepoProph->reveal(), $userMillProph->reveal());
    $this->assertEquals($userProph->reveal(), $mill->getLoggedInUser());
  }

  /**
   * @expectedException GTSailing\Domain\NotLoggedInException
   */
  function testGetLoggedInUser_NoUserLoggedIn() {
    $userProph = $this->prophesize('GTSailing\Domain\User');

    $userMillProph = $this->prophesize('GTSailing\Mills\UserMill');

    $sessionProph = $this->prophesize('GTSailing\Domain\Session');
    $sessionProph->getLoggedInUser()->willThrow(new NotLoggedInException());

    $sessionRepoProph = $this->prophesize('GTSailing\Repositories\SessionRepo');
    $sessionRepoProph->getSession()->willReturn($sessionProph->reveal());

    $mill = new LoginMill($sessionRepoProph->reveal(), $userMillProph->reveal());
    $mill->getLoggedInUser();
  }

}

?>