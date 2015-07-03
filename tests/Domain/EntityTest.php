<?php

use GTSailing\Domain\Entity;

class EntityTest extends Tests\TestCase {

  function testGetID() {
    $entity = new EntityMock(25);
    $this->assertEquals(25, $entity->getID());
  }
}

class EntityMock extends Entity {
}

?>