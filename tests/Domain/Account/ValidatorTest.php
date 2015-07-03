<?php

use GTSailing\Domain\Account\Validator;

class ValidatorTest extends Tests\TestCase {

  function testValidateEmail_Valid() {
    $validator = new Validator();
    $isValid = $validator->validateEmail('yoyo@google.com');
    $this->assertTrue($isValid);
  }

  function testValidateEmail_NotValid() {
    $validator = new Validator();
    $isValid = $validator->validateEmail('yoyo@google');
    $this->assertFalse($isValid);
  }

  function testValidateEmail_TooLong() {
    $validator = new Validator();
    $isValid = $validator->validateEmail('yoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyooooo@google.com');
    $this->assertFalse($isValid);
  }
}