<?php

namespace GTSailing\Domain\Security;

class NotLoggedInException extends \Exception {

  function __construct() {
    parent::__construct("Nobody is currently logged in.");
  }
}

?>