<?php

namespace GTSailing\Endpoints;

/**
 * A serializeable version of GTSailing\Domain\User
 */
class UserResource {

  /**
   * @param GTSailing\Domain\User $user
  */
  function __construct($user) {
    $this->id = $user->getID();
  }

  
}

?>