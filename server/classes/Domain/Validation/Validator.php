<?php

namespace GTSailing\Domain\Validation;

class Validator {

  public function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }
}

?>