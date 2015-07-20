<?php

namespace Tests\Domain\Account;

use GTSailing\Domain\Account\UserValidator;
use GTSailing\Domain\Validation\Validator;

class UserValidatorTest extends \Tests\TestCase {

  const VALID_FIRST_NAME = 'JD';
  const VALID_LAST_NAME = 'Reddaway';
  const VALID_PHONE = '7701234567';
  
  const INVALID_FIRST_NAME_TOO_LONG = '1234567890123456789012345678901';

  function testValidateEmail_Valid() {
    $validatorProph = $this->prophesize(Validator::class);
    $validatorProph->validateEmail('email')->willReturn(true);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateEmail('email');
    $this->assertTrue(empty($ret));
  }

  function testValidateEmail_Invalid() {
    $validatorProph = $this->prophesize(Validator::class);
    $validatorProph->validateEmail('email')->willReturn(false);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateEmail('email');
    $this->assertContains(UserValidator::INVALID_EMAIL_ERROR, $ret);
  }

  function testValidateFirstName_Valid() {
    $validatorProph = $this->prophesize(Validator::class);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateFirstName('123456789012345678901234567890');
    $this->assertTrue(empty($ret));
  }

  function testValidateFirstName_TooLong() {
    $validatorProph = $this->prophesize(Validator::class);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateFirstName(self::INVALID_FIRST_NAME_TOO_LONG);
    $this->assertContains(UserValidator::FIRST_NAME_TOO_LONG_ERROR, $ret);
  }
}