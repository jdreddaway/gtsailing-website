<?php

use DI\ContainerBuilder;
use Prophecy\Prophet;

use Tests\TestCase;
use Tests\Domain\Facebook\FBUserRetrieverTest;
use Tests\Repositories\Account\UserRepoTest;
use Tests\Domain\Account\UserTest;

use GTSailing\Domain\Security\NotLoggedInException;
use GTSailing\Domain\Security\Session;
use GTSailing\Domain\Facebook\InvalidFBSessionException;
use GTSailing\Endpoints\BadRequestException;
use GTSailing\Endpoints\LoginEndpoint;
use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Repositories\DoesNotExistException;
use GTSailing\Repositories\UserSqlStore;

class LoginEndpointTest extends TestCase {

  function testPost_WithAccessToken() {
    $_POST['accessToken'] = FBUserRetrieverTest::ACCESS_TOKEN;
    UserRepoTest::setUpDiForLoad($this->prophet, $this->containerBuilder);

    $responseWriterProph = $this->prophesize(ResponseWriter::class);
    $responseWriterProph->setStatusCode(201)->shouldBeCalledTimes(1);

    FBUserRetrieverTest::setUpDIToGetUserByAccessToken($this->prophet, $this->containerBuilder);
    $sessionArray = array();
    $session = new Session($sessionArray);
    $this->containerBuilder->addDefinitions([
      Session::class => $session,
      ResponseWriter::class => $responseWriterProph->reveal()
    ]);
    $container = $this->containerBuilder->build();
    $endpoint = $container->get(LoginEndpoint::class);
    $endpoint->post();

    $this->assertEqualsEquals(UserRepoTest::createDefaultUser(), $session->getLoggedInUser());
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
   */
  function testPost_NoToken() {
    $responseWriterProph = $this->prophesize(ResponseWriter::class);
    $sessionArray = array();
    $session = new Session($sessionArray);
    $this->containerBuilder->addDefinitions([
      ResponseWriter::class => $responseWriterProph->reveal(),
      Session::class => $session
    ]);

    $endpoint = $this->containerBuilder->build()->get(LoginEndpoint::class);
    $endpoint->post();
    $this->assertFalse($session->userIsLoggedIn());
  }

  function testPost_InvalidFBSession() {
    $_POST['accessToken'] = FBUserRetrieverTest::ACCESS_TOKEN;

    FBUserRetrieverTest::setUpDIToGetUserByAccessToken_InvalidSession(
      $this->prophet, $this->containerBuilder);

    $session = $this->createSession();
    $this->containerBuilder->addDefinitions([
      ResponseWriter::class => $this->prophesize(ResponseWriter::class)->reveal(),
      Session::class => $session
    ]);

    $endpoint = $this->containerBuilder->build()->get(LoginEndpoint::class);
    try {
      $endpoint->post();
      $this->fail();
    } catch (BadRequestException $ex) {}

    $this->assertFalse($session->userIsLoggedIn());
  }

  /**
   * @expectedException GTSailing\Endpoints\NotFoundException
   */
  function testPost_UserNotRegistered() {
    $_POST['accessToken'] = FBUserRetrieverTest::ACCESS_TOKEN;
    FBUserRetrieverTest::setUpDIToGetUserByAccessToken($this->prophet, $this->containerBuilder);

    $session = $this->createSession();
    $userStoreProph = $this->prophesize(UserSqlStore::class);
    $userStoreProph->loadByFBID(UserRepoTest::FB_ID)->willThrow(DoesNotExistException::class);
    $this->containerBuilder->addDefinitions([
      ResponseWriter::class => $this->prophesize(ResponseWriter::class)->reveal(),
      Session::class => $session,
      UserSqlStore::class => $userStoreProph->reveal()
    ]);

    $endpoint = $this->containerBuilder->build()->get(LoginEndpoint::class);
    $endpoint->post();
  }

  function testGet_UserLoggedIn() {
    $user = UserTest::createAuthenticatedUser($this->prophet);
    $session_arr = array();
    $session = new Session($session_arr);
    $session->logUserIn($user);

    $responseWriterProph = $this->prophesize(ResponseWriter::class);
    $responseWriterProph->writeBody('true')->shouldBeCalledTimes(1);

    $this->containerBuilder->addDefinitions([
      Session::class => $session,
      ResponseWriter::class => $responseWriterProph->reveal()
    ]);

    $endpoint = $this->containerBuilder->build()->get(LoginEndpoint::class);
    $endpoint->get();
  }

  function testGet_NoUserLoggedIn() {
    $session_arr = array();
    $session = new Session($session_arr);

    $responseWriterProph = $this->prophesize(ResponseWriter::class);
    $responseWriterProph->writeBody('false')->shouldBeCalledTimes(1);

    $this->containerBuilder->addDefinitions([
      Session::class => $session,
      ResponseWriter::class => $responseWriterProph->reveal()
    ]);

    $endpoint = $this->containerBuilder->build()->get(LoginEndpoint::class);
    $endpoint->get();
  }

  private function createSession() {
    $sessionArray = array();
    return new Session($sessionArray);
  }
}

?>