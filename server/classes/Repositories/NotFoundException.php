<?php

namespace GTSailing\Repositories;

use \Exception;

class NotFoundException extends Exception {

  function __construct($message) {
    parent::__construct($message);
  }
}

?>