<?php

namespace GTSailing\Domain\Validation;

class InvalidValuesException extends \Exception {

  public $errorCodes;

  function __construct($errorCodes) {
    $this->errorCodes = $errorCodes;
  }
}

?>