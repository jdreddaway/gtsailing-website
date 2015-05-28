<?php

namespace GTSailing\Endpoints;

class BadRequestException extends RequestException {

  function __construct($message) {
    parent::__construct(404, $message);
  }
}

?>