<?php

namespace Tests\DI;

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
    $builder->addDefinitions([
      UserSqlStore::class => $prophet->prophesize(UserSqlStore::class)->reveal()
    ]);
    return $builder;
  }
}

?>