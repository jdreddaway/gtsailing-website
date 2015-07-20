<?php

namespace Tests\Endpoints;

use Prophecy\Argument\Token\TokenInterface;
use GTSailing\Endpoints\UserResource;

/**
 * Used in Prophecy for matching an argument to a specific UserResource.
 */
class UserResourceMatcherToken implements TokenInterface {

  private $id;
  private $firstName;
  private $lastName;
  private $email;
  private $phone;

  public function __construct($id, $firstName, $lastName, $email, $phone) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->phone = $phone;
  }
  
  public function scoreArgument($arg) {
    if ($arg instanceof UserResource
        && $this->id == $arg->id
        && $this->firstName == $arg->firstName
        && $this->lastName == $arg->lastName
        && $this->email == $arg->email
        && $this->phone == $arg->phone) {
      return 7; // this is what Prophecy's source code does. returning true doesn't work
    } else {
      return false;
    }
  }

  public function isLast() { return false; }

  public function __toString() { return 'UserResourceMatcherToken'; }
}

?>