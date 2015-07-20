<?php

namespace GTSailing\Endpoints;

class ArgumentVerifier {

  function __construct(BadRequestExceptionFactory $badRequestExceptionFactory) {
    $this->badRequestExceptionFactory = $badRequestExceptionFactory;
  }

  public function verifyPostKeysExist($requiredFields) {
    $missing = array();
    foreach ($requiredFields as $field) {
      if (!isset($_POST[$field])) {
        $missing[] = $field;
      }
    }

    if (sizeof($missing) > 0) {
      $this->badRequestExceptionFactory->throwMissingPostFieldsException($missing);
    }
  }
}