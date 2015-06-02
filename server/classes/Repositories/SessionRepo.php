<?php

namespace GTSailing\Repositories;

use GTSailing\Domain\Session;

class SessionRepo {

  public function getSession() {
    session_start();
    return new Session($_SESSION);
  }
}

?>