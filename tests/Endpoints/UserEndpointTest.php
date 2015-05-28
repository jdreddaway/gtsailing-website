<?php

use GTSailing\Domain\User;
use GTSailing\Endpoints\JsonSerializer;
use GTSailing\Endpoints\UserEndpoint;
use GTSailing\Endpoints\UserResource;
use GTSailing\Endpoints\ResponseWriter;

class UserEndpointTest extends PHPUnit_Framework_TestCase {

  public function testGet() {
    $_GET['accessToken'] = 'sometoken';

    $user = new User(57);

    $millMock = $this->getMockBuilder('GTSailing\Mills\UserMill')
      ->setMethods(array('getUserByFBAccessToken'))
      ->disableOriginalConstructor()
      ->getMock();
    $millMock
      ->expects($this->once())
      ->method('getUserByFBAccessToken')
      ->with('sometoken')
      ->willReturn($user);

    $serializerMock = $this->getMockBuilder('GTSailing\Endpoints\JsonSerializer')
      ->setMethods(array('serialize'))
      ->getMock();
    $serializerMock
      ->expects($this->once())
      ->method('serialize')
      ->with($this->callback(function($arg) { return $arg instanceof UserResource; }))
      ->willReturn('json');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')
      ->setMethods(array('setStatusCode', 'writeBody'))
      ->disableOriginalConstructor()
      ->getMock();
    $writerMock->expects($this->at(0))->method('setStatusCode')->with(200);
    $writerMock->expects($this->at(1))->method('writeBody')->with('json');

    $endpoint = new UserEndpoint($millMock, $serializerMock, $writerMock);
    $endpoint->get();
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
  */
  function testGet_NoAccessToken() {
    $millMock = $this->getMockBuilder('GTSailing\Mills\UserMill')
      ->setMethods(array('getUserByFBAccessToken'))
      ->disableOriginalConstructor()
      ->getMock();

    $serializerMock = $this->getMockBuilder('GTSailing\Endpoints\JsonSerializer')
      ->setMethods(array('serialize'))
      ->getMock();

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')
      ->setMethods(array('setStatusCode', 'writeBody'))
      ->disableOriginalConstructor()
      ->getMock();

    $endpoint = new UserEndpoint($millMock, $serializerMock, $writerMock);
    $endpoint->get();
  }
}

?>