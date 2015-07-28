<?php

namespace Tests\Domain\Facebook;

use \Exception;

use DI\ContainerBuilder;

use Facebook\GraphUser;
use Facebook\FacebookResponse;
use Facebook\FacebookSession;

use Prophecy\Prophet;

use Tests\Domain\Facebook\FBUserTest;
use Tests\DI\TestContainerBuilderFactory;
use Tests\Repositories\Account\UserRepoTest;
use Tests\TestCase;

use GTSailing\Facebook\SessionFactory;
use GTSailing\Facebook\Requester;
use GTSailing\Facebook\Initializer;
use GTSailing\Domain\Facebook\InvalidFBSessionException;
use GTSailing\Domain\Facebook\FBUserRetriever;

class FBUserRetrieverTest extends TestCase {
  const ACCESS_TOKEN = 'super_awesome_token';

  function testGetUserByFBAccessToken() {
    self::setUpDIToGetUserByAccessToken($this->prophet, $this->containerBuilder);

    $container = $this->containerBuilder->build();

    $retriever = $container->get(FBUserRetriever::class);
    $fbUser = $retriever->getUserByFBAccessToken(self::ACCESS_TOKEN);
    $this->assertTrue($fbUser->isQueryingUser());
  }

  function testGetUserByFBAccessToken_InvalidSession() {
    self::setUpDIToGetUserByAccessToken_InvalidSession($this->prophet, $this->containerBuilder);
    $container = $this->containerBuilder->build();

    $retriever = $container->get(FBUserRetriever::class);

    try {
      $retriever->getUserByFBAccessToken('super_awesome_token');
      $this->fail("Should have thrown InvalidFBSessionException");
    } catch (InvalidFBSessionException $ex) {
      $this->assertEquals("bad session", $ex->getMessage());
    }
  }

  public static function setUpDIToGetUserByAccessToken_InvalidSession(
      Prophet $prophet, ContainerBuilder $containerBuilder) {
    $sessionProph = $prophet->prophesize(FacebookSession::class);
    $sessionProph->validate()->willThrow(new Exception("bad session"));

    $fbSessionFactoryProph = $prophet->prophesize(SessionFactory::class);
    $fbSessionFactoryProph->create('super_awesome_token')->willReturn($sessionProph->reveal());

    $initializerProph = $prophet->prophesize(Initializer::class);
    $initializerProph->initialize()->shouldBeCalledTimes(1);

    $containerBuilder->addDefinitions([
      SessionFactory::class => $fbSessionFactoryProph->reveal(),
      Initializer::class => $initializerProph->reveal()
    ]);
  }

  public static function setUpDIToGetUserByAccessToken(
      Prophet $prophet, ContainerBuilder $containerBuilder) {
    $sessionProph = $prophet->prophesize(FacebookSession::class);
    $sessionProph->validate()->shouldBeCalledTimes(1);

    $fbSessionFactoryProph = $prophet->prophesize(SessionFactory::class);
    $fbSessionFactoryProph->create(self::ACCESS_TOKEN)->willReturn($sessionProph->reveal());

    $fbUserProph = $prophet->prophesize(GraphUser::class);
    $fbUserProph->getId()->willReturn(UserRepoTest::FB_ID);
    $fbResponseProph = $prophet->prophesize(FacebookResponse::class);
    $fbResponseProph->getGraphObject('Facebook\GraphUser')->willReturn($fbUserProph->reveal());

    $requesterProph = $prophet->prophesize(Requester::class);
    $requesterProph->request($sessionProph->reveal(), 'GET', '/me')->willReturn($fbResponseProph->reveal());

    $initializerProph = $prophet->prophesize(Initializer::class);
    $initializerProph->initialize()->shouldBeCalledTimes(1);

    $containerBuilder->addDefinitions([
      Initializer::class => $initializerProph->reveal(),
      SessionFactory::class => $fbSessionFactoryProph->reveal(),
      Requester::class => $requesterProph->reveal()
    ]);
  }
}