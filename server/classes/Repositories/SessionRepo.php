<?php

namespace GTSailing\Repositories;

use GTSailing\Domain\Security\Session;

class SessionRepo {

  public function getSession() {
    session_start();
    return new Session($_SESSION);
  }
}

?>