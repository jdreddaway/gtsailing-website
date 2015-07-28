<?php

namespace Tests\DI;

use Prophecy\Argument;
use DI\ContainerBuilder;
use GTSailing\Repositories\UserSqlStore;
use Prophecy\Prophet;
use Tests\DI\ThisShouldBeMockedException;

/**
 * Use this for a unit testing PHP-DI container. 
 */
class TestContainerBuilderFactory {

  function create(Prophet $prophet) {
    $builder = new ContainerBuilder();
    $userStore = $prophet->prophesize(UserSqlStore::class);

    //userStore should not be used unless overridden.
    $userStore->loadByID(Argument::any())->shouldBeCalledTimes(0);
    $userStore->loadByFBID(Argument::any())->shouldBeCalledTimes(0);
    $userStore->createUser(Argument::any(), Argument::any(), Argument::any(), Argument::any(),
      Argument::any(), Argument::any())->shouldBeCalledTimes(0);
    $builder->addDefinitions([
      UserSqlStore::class => $userStore->reveal()
    ]);
    return $builder;
  }
}

?>