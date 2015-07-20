<?php

namespace GTSailing\Domain\Account;

use GTSailing\Domain\Validation\Validator;

class UserValidator {

  const INVALID_EMAIL_ERROR = 'INVALID_EMAIL_ERROR';
  const FIRST_NAME_TOO_LONG_ERROR = 'FIRST_NAME_TOO_LONG_ERROR';

  function __construct(Validator $validator) {
    $this->validator = $validator;
  }

  function validateEmail($email) {
    if (!$this->validator->validateEmail($email)) {
      return array(self::INVALID_EMAIL_ERROR);
    } else {
      return array();
    }
  }

  function validateFirstName($name) {
    if (strlen($name) > 30) {
      return array(self::FIRST_NAME_TOO_LONG_ERROR);
    } else {
      return array();
    }
  }
}