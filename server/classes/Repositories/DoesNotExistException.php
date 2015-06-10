<?php

namespace GTSailing\Repositories;

use \Exception;

class DoesNotExistException extends Exception {

  function __construct($message) {
    parent::__construct($message);
  }
}

?>