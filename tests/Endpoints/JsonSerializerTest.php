<?php

use GTSailing\Endpoints\JsonSerializer;

class JsonSerializerTest extends PHPUnit_Framework_TestCase {

  function testSerialize() {
    $resource = new stdClass();
    $resource->id = 57;
    $resource->name = 'burdell';

    $serializer = new JsonSerializer();
    $ret = $serializer->deserialize($serializer->serialize($resource));

    $this->assertEquals(57, $ret->id);
    $this->assertEquals('burdell', $ret->name);
  }
}

?>