<?php

namespace GTSailing\Endpoints;

class NotFoundException extends RequestException {

  function __construct($message, \Exception $previous = null) {
    parent::__construct(404, $message, $previous);
  }
}

?>