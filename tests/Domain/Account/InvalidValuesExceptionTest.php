<?php

use GTSailing\Domain\Validation\InvalidValuesException;

class InvalidValuesExceptionTest extends \Tests\TestCase {

  function testConstructor() {
    $ex = new InvalidValuesException(array('sup', 'hey'));
    $this->assertTrue(in_array('sup', $ex->errorCodes));
    $this->assertTrue(in_array('hey', $ex->errorCodes));
  }
}

?>