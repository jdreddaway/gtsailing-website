<?php

use Prophecy\Argument;

use Tests\TestCase;
use Tests\DI\TestContainerBuilderFactory;
use Tests\Repositories\Account\UserRepoTest;
use Tests\Endpoints\UserResourceMatcherToken;

use GTSailing\DI\ContainerBuilder;
use GTSailing\Domain\Account\User;
use GTSailing\Endpoints\JsonSerializer;
use GTSailing\Endpoints\UserEndpoint;
use GTSailing\Endpoints\UserResource;
use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Endpoints\NotFoundException;
use GTSailing\Mills\InvalidFBSessionException;
use GTSailing\Mills\UserMill;
use GTSailing\Repositories\DoesNotExistException;
use GTSailing\Repositories\UserSqlStore;

class UserEndpointTest extends TestCase {

  public function testGet() {
    $_GET['accessToken'] = 'sometoken';

    $user = new User(UserRepoTest::GT_ID, UserRepoTest::FIRST_NAME, UserRepoTest::LAST_NAME,
      UserRepoTest::EMAIL, UserRepoTest::PHONE, UserRepoTest::FB_ID, 'hashedPass');


    $userMillProph = $this->prophesize(UserMill::class);
    $userMillProph->getUserByFBAccessToken('sometoken')->willReturn($user);

    $serializerProph = $this->prophesize(JsonSerializer::class);
    $expectedResource = new UserResource($user);
    $serializerProph->serialize($expectedResource)->willReturn('userjson');

    $writerProph = $this->prophesize(ResponseWriter::class);
    $writerProph->writeBody('userjson')->shouldBeCalledTimes(1);
    $writerProph->setStatusCode(200)->shouldBeCalledTimes(1);

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    UserRepoTest::setUpDIForLoad($this->prophet, $containerBuilder);
    $containerBuilder->addDefinitions([
      UserMill::class => $userMillProph->reveal(),
      JsonSerializer::class => $serializerProph->reveal(),
      ResponseWriter::class => $writerProph->reveal()
    ]);
    $container = $containerBuilder->build();
    $endpoint = $container->get(UserEndpoint::class);

    $endpoint->get();
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
  */
  function testGet_NoAccessToken() {
    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $container = $containerBuilder->build($this->prophet);
    $endpoint = $container->get(UserEndpoint::class);

    $endpoint->get();
  }

  /**
   * @expectedException GTSailing\Endpoints\NotFoundException
   * @expectedExceptionMessage baddd
   */
  function testGet_UserDoesNotExist() {
    $_GET['accessToken'] = 'super_tok';

    $millProph = $this->prophesize(UserMill::class);
    $millProph->getUserByFBAccessToken('super_tok')->willThrow(new DoesNotExistException('baddd'));

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $containerBuilder->addDefinitions([
      UserMill::class => $millProph->reveal()
    ]);
    $container = $containerBuilder->build();
    $endpoint = $container->get(UserEndpoint::class);

    $endpoint->get();
  }

  /**
   * @expectedException GTSailing\Endpoints\BadRequestException
   * @expectedExceptionMessage baddd
   */
  function testGet_InvalidFBSession() {
    $_GET['accessToken'] = 'super_tok';

    $millProph = $this->prophesize(UserMill::class);
    $millProph->getUserByFBAccessToken('super_tok')->willThrow(new InvalidFBSessionException('baddd'));

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $containerBuilder->addDefinitions([
      UserMill::class => $millProph->reveal()
    ]);
    $container = $containerBuilder->build();
    $endpoint = $container->get(UserEndpoint::class);
    $endpoint->get();
  }

  function testPost_Success() {
    $_POST['email'] = UserRepoTest::EMAIL;
    $_POST['firstName'] = UserRepoTest::FIRST_NAME;
    $_POST['lastName'] = UserRepoTest::LAST_NAME;
    $_POST['phone'] = UserRepoTest::PHONE;
    $_POST['password'] = UserRepoTest::PASSWORD;
    $_POST['fbID'] = UserRepoTest::FB_ID;

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    UserRepoTest::setUpDIForCreate($this->prophet, $containerBuilder);

    $serializerProph = $this->prophesize(JsonSerializer::class);
    $expectedResource = new UserResourceMatcherToken(UserRepoTest::GT_ID, UserRepoTest::FIRST_NAME,
        UserRepoTest::LAST_NAME, UserRepoTest::EMAIL, UserRepoTest::PHONE);
    $serializerProph->serialize($expectedResource)->willReturn('userjson');

    $writerProph = $this->prophesize(ResponseWriter::class);
    $writerProph->writeBody('userjson')->shouldBeCalledTimes(1);

    $containerBuilder->addDefinitions([
      JsonSerializer::class => $serializerProph->reveal(),
      ResponseWriter::class => $writerProph->reveal()
    ]);
    $container = $containerBuilder->build();
    $endpoint = $container->get(UserEndpoint::class);

    $endpoint->post();
  }

  //TODO test validation error
}

?>