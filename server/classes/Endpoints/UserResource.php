<?php

namespace GTSailing\Endpoints;

/**
 * A serializeable version of GTSailing\Domain\Account\User
 */
class UserResource {

  /**
   * @param GTSailing\Domain\User $user
  */
  function __construct($user) {
    $this->id = $user->getID();
    $this->firstName = $user->getFirstName();
    $this->lastName = $user->getLastName();
    $this->email = $user->getEmail();
    $this->phone = $user->getPhoneNumber();
  }

  
}

?>