<?php

namespace Tests\Domain\Validation;

use GTSailing\Domain\Validation\Validator;

class ValidatorTest extends \Tests\TestCase {

  const VALID_EMAIL = 'yoyo@google.com';
  const INVALID_EMAIL_NO_TLD = 'yoyo@google';
  const INVALID_EMAIL_TOO_LONG = 'yoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyoooooyoyooooo@google.com';

  function testValidateEmail_Valid() {
    $validator = new Validator();
    $isValid = $validator->validateEmail(self::VALID_EMAIL);
    $this->assertTrue($isValid);
  }

  function testValidateEmail_NotValid() {
    $validator = new Validator();
    $isValid = $validator->validateEmail(self::INVALID_EMAIL_NO_TLD);
    $this->assertFalse($isValid);
  }

  function testValidateEmail_TooLong() {
    $validator = new Validator();
    $isValid = $validator->validateEmail(self::INVALID_EMAIL_TOO_LONG);
    $this->assertFalse($isValid);
  }
}