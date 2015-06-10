<?php

namespace GTSailing\Endpoints;

class BadRequestException extends RequestException {

  function __construct($message, \Exception $previous = null) {
    parent::__construct(400, $message, $previous);
  }
}

?>