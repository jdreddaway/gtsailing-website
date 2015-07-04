<?php

use GTSailing\DI\ProdContainerBuilderFactory;
use GTSailing\Endpoints\UserEndpoint;

class ProdContainerBuilderFactoryTest extends Tests\TestCase {

  static function setUpBeforeClass() {
    print(__DIR__);
    $_SERVER['DOCUMENT_ROOT'] = __DIR__.'/../../server/content';
  }

  function testCreateUserEndpoint() {
    $builder = (new ProdContainerBuilderFactory())->create();
    $container = $builder->build();
    $endpoint = $container->get(UserEndpoint::class);
  }
}

?>