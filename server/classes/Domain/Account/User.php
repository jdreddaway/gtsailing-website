<?php

namespace GTSailing\Domain\Account;

use GTSailing\Domain\Entity;

class User extends Entity {

  private $firstName;
  private $lastName;
  private $email;
  private $phone;
  private $fbID;
  
  function __construct($id, $firstName, $lastName, $email, $phone, $fbID) {
    parent::__construct($id);

    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->phone = $phone;
    $this->fbID = $fbID;
  }

  public function getFirstName() { return $this->firstName; }

  public function getLastName() { return $this->lastName; }

  public function getEmail() { return $this->email; }

  public function getFBID() { return $this->fbID; }

  public function getPhoneNumber() { return $this->phone; }
}

?>