<?php

use Tests\TestCase;
use GTSailing\Endpoints\LoginEndpoint;
use GTSailing\Domain\Security\NotLoggedInException;
use GTSailing\Mills\InvalidFBSessionException;
use GTSailing\Repositories\DoesNotExistException;

class LoginEndpointTest extends TestCase {

  function testPost_WithAccessToken() {
    $_POST['accessToken'] = 'mysuperfbaccesstoken';

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->logInByFBAccessToken('mysuperfbaccesstoken')->shouldBeCalledTimes(1);

    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');
    $responseWriterProph->setStatusCode(201)->shouldBeCalledTimes(1);

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->post();
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
   */
  function testPost_NoToken() {
    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->logInByFBAccessToken()->shouldNotBeCalled();

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->post();
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
   * @expectedExceptionMessage bad_sessionn
   */
  function testPost_InvalidFBSession() {
    $_POST['accessToken'] = 'mysuperfbaccesstoken';

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->logInByFBAccessToken('mysuperfbaccesstoken')->willThrow(new InvalidFBSessionException('bad_sessionn'));

    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->post();
  }

  /**
   * @expectedException GTSailing\Endpoints\NotFoundException
   */
  function testPost_UserNotRegistered() {
    $_POST['accessToken'] = 'mysuperfbaccesstoken';

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->logInByFBAccessToken('mysuperfbaccesstoken')->willThrow(new DoesNotExistException('user not found'));

    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->post();
  }

  function testGet_UserLoggedIn() {
    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');
    $responseWriterProph->writeBody('true')->shouldBeCalledTimes(1);

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->getLoggedInUser()->willReturn('some_user');

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->get();
  }

  function testGet_NoUserLoggedIn() {
    $responseWriterProph = $this->prophesize('GTSailing\Endpoints\ResponseWriter');
    $responseWriterProph->writeBody('false')->shouldBeCalledTimes(1);

    $loginMillProph = $this->prophesize('GTSailing\Mills\LoginMill');
    $loginMillProph->getLoggedInUser()->willThrow(new NotLoggedInException());

    $endpoint = new LoginEndpoint($responseWriterProph->reveal(), $loginMillProph->reveal());
    $endpoint->get();
  }
}

?>