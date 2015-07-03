<?php

namespace GTSailing\Domain\Account;

class UserValidator {

  function __construct(Validator $validator) {
    $this->validator = $validator;
  }

  function validateEmail($email) {
    if (!$this->validator->validateEmail($email)) {
      return array("The email address $email is invalid.");
    } else {
      return array();
    }
  }

  function validateFirstName($name) {
    if (strlen($name) > 30) {
      return array('The first name may not exceed 30 characters.');
    } else {
      return array();
    }
  }
}