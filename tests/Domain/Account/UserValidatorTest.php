<?php

use GTSailing\Domain\Account\UserValidator;

class UserValidatorTest extends Tests\TestCase {

  function testValidateEmail_Valid() {
    $validatorProph = $this->prophesize('GTSailing\Domain\Account\Validator');
    $validatorProph->validateEmail('email')->willReturn(true);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateEmail('email');
    $this->assertTrue(empty($ret));
  }

  function testValidateEmail_Invalid() {
    $validatorProph = $this->prophesize('GTSailing\Domain\Account\Validator');
    $validatorProph->validateEmail('email')->willReturn(false);

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateEmail('email');
    $this->assertFalse(empty($ret));
  }

  function testValidateFirstName_Valid() {
    $validatorProph = $this->prophesize('GTSailing\Domain\Account\Validator');

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateFirstName('123456789012345678901234567890');
    $this->assertTrue(empty($ret));
  }

  function testValidateFirstName_TooLong() {
    $validatorProph = $this->prophesize('GTSailing\Domain\Account\Validator');

    $userValidator = new UserValidator($validatorProph->reveal());
    $ret = $userValidator->validateFirstName('1234567890123456789012345678901');
    $this->assertFalse(empty($ret));
  }
}