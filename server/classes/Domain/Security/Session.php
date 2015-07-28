<?php

namespace GTSailing\Domain\Security;

use GTSailing\Domain\Account\User;

class Session {

  private $sessionVar;

  /**
   * @param $sessionVar Should be the $_SESSION global array.
   */
  function __construct(&$sessionVar) {
    $this->sessionVar = &$sessionVar;
  }

  public function logUserIn(User $user) {
    if (!$user->isAuthenticated()) {
      throw new NotAuthenticatedException();
    }
    
    $this->sessionVar['user'] = $user;
  }

  public function getLoggedInUser() {
    if (!$this->userIsLoggedIn()) {
      throw new NotLoggedInException();
    }
    
    return $this->sessionVar['user'];
  }

  public function userIsLoggedIn() {
    return isset($this->sessionVar['user']);
  }

  public function close() {
    session_write_close();
  }
}

?>