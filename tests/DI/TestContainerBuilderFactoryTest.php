<?php

use GTSailing\Repositories\UserSqlStore;
use Prophecy\Prophet;
use Prophecy\Prophecy\ObjectProphecy;
use Tests\DI\TestContainerBuilderFactory;

class TestContainerBuilderFactoryTest extends Tests\TestCase {

  function testGettingStores() {
    $prophecyMock = $this->getMockBuilder('Prophecy\Prophet')
        ->disableOriginalConstructor()
        ->setMethods(array('reveal'))
        ->getMock();
    $prophecyMock->method('reveal')->willReturn('fakestore');

    $prophetProph = $this->prophesize(Prophet::class);
    $prophetProph->prophesize(UserSqlStore::class)->willReturn($prophecyMock);

    $container = (new TestContainerBuilderFactory())->create($prophetProph->reveal())->build();
    $this->assertEquals('fakestore', $container->get(UserSqlStore::class));
  }
}

?>