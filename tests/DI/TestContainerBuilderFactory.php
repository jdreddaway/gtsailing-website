<?php

namespace Tests\DI;

use DI\ContainerBuilder;
use GTSailing\Repositories\UserSqlStore;
use Tests\DI\ThisShouldBeMockedException;

/**
 * Use this for a unit testing PHP-DI container. 
 */
class TestContainerBuilderFactory {

  function create() {
    $builder = new ContainerBuilder();
    $builder->addDefinitions([
      UserSqlStore::class => new ThisShouldBeMockedException()
    ]);
    return $builder;
  }
}

?>