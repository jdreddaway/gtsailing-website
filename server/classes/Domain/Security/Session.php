<?php

namespace GTSailing\Domain\Security;

class Session {

  private $sessionVar;

  /**
   * @param $sessionVar Should be the $_SESSION global array.
   */
  function __construct(&$sessionVar) {
    $this->sessionVar = &$sessionVar;
  }

  public function logUserIn(User $user) {
    $this->sessionVar['user'] = $user;
  }

  public function getLoggedInUser() {
    if (!isset($this->sessionVar['user'])) {
      throw new NotLoggedInException();
    }
    
    return $this->sessionVar['user'];
  }

  public function close() {
    session_write_close();
  }
}

?>