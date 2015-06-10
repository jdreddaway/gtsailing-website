<?php

use GTSailing\Mills\InvalidFBSessionException;
use GTSailing\Mills\UserMill;

class UserMillTest extends PHPUnit_Framework_TestCase {

  function testGetUserByFBAccessToken() {
    $sessionMock = $this->getMockBuilder('Facebook\FacebookSession')
      ->setMethods(array('validate'))
      ->disableOriginalConstructor()
      ->getMock();
    $sessionMock->expects($this->once())->method('validate');

    $fbSessionFactoryMock = $this->getMockBuilder('GTSailing\Facebook\SessionFactory')->setMethods(array('create'))->getMock();
    $fbSessionFactoryMock
      ->expects($this->once())
      ->method('create')
      ->with('super_awesome_token')
      ->will($this->returnValue($sessionMock));

    $userMock = $this->getMockBuilder('Facebook\GraphUser')
      ->setMethods(array('getId'))
      ->disableOriginalConstructor()
      ->getMock();
    $userMock->expects($this->once())->method('getId')->willReturn('someid');

    $fbResponseMock = $this
      ->getMockBuilder('Facebook\FacebookResponse')
      ->setMethods(array('getGraphObject'))
      ->disableOriginalConstructor()
      ->getMock();
    $fbResponseMock
      ->expects($this->once())
      ->method('getGraphObject')
      ->with('Facebook\GraphUser')
      ->will($this->returnValue($userMock));

    $requesterMock = $this->getMockBuilder('GTSailing\Facebook\Requester')->setMethods(array('request'))->getMock();
    $requesterMock->expects($this->once())->method('request')->with($sessionMock, 'GET', '/me')->willReturn($fbResponseMock);

    $user = 'someuser';

    $userRepoMock = $this->getMockBuilder('GTSailing\Repositories\UserRepo')
      ->setMethods(array('loadByFBId'))
      ->disableOriginalConstructor()
      ->getMock();
    $userRepoMock->expects($this->once())->method('loadByFBID')->with('someid')->willReturn($user);

    $initializerMock = $this->getMockBuilder('GTSailing\Facebook\Initializer')
      ->setMethods(array('initialize'))
      ->getMock();
    $initializerMock->expects($this->once())->method('initialize');

    $mill = new UserMill($userRepoMock, $fbSessionFactoryMock, $requesterMock, $initializerMock);
    $result = $mill->getUserByFBAccessToken('super_awesome_token');

    $this->assertEquals($user, $result);
  }

  function testGetUserByFBAccessToke_InvalidSession() {
    $sessionMock = $this->getMockBuilder('Facebook\FacebookSession')
      ->setMethods(array('validate'))
      ->disableOriginalConstructor()
      ->getMock();
    $sessionMock->expects($this->once())->method('validate')->will($this->throwException(new Exception("bad session")));

    $fbSessionFactoryMock = $this->getMockBuilder('GTSailing\Facebook\SessionFactory')->setMethods(array('create'))->getMock();
    $fbSessionFactoryMock
      ->expects($this->once())
      ->method('create')
      ->with('super_awesome_token')
      ->will($this->returnValue($sessionMock));

    $initializerMock = $this->getMockBuilder('GTSailing\Facebook\Initializer')
      ->setMethods(array('initialize'))
      ->getMock();
    $initializerMock->expects($this->once())->method('initialize');

    $userRepoMock = $this->getMockBuilder('GTSailing\Repositories\UserRepo')
      ->setMethods(array('loadByFBId'))
      ->disableOriginalConstructor()
      ->getMock();

    $requesterMock = $this->getMockBuilder('GTSailing\Facebook\Requester')->setMethods(array('request'))->getMock();

    $mill = new UserMill($userRepoMock, $fbSessionFactoryMock, $requesterMock, $initializerMock);

    try {
      $mill->getUserByFBAccessToken('super_awesome_token');
      $this->fail("Should have thrown InvalidFBSessionException");
    } catch (InvalidFBSessionException $ex) {
      $this->assertEquals("bad session", $ex->getMessage());
    }
  }

}