<?php

use GTSailing\Repositories\UserSqlStore;
use GTSailing\Mills\UserMill;
use Tests\DI\TestContainerBuilderFactory;
use Tests\DI\ThisShouldBeMockedException;
use \PDO;

class TestContainerBuilderFactoryTest extends Tests\TestCase {

  function testGettingStores() {
    $container = (new TestContainerBuilderFactory())->create()->build();
    $this->assertTrue($container->get(UserSqlStore::class) instanceof ThisShouldBeMockedException);
  }
}

?>