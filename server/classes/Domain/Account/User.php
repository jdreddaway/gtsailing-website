<?php

namespace GTSailing\Domain\Account;

use GTSailing\Domain\Entity;
use GTSailing\Domain\Facebook\FBUser;
use GTSailing\Domain\Security\PasswordHasher;
use GTSailing\Domain\Security\Session;

class User extends Entity {

  private $firstName;
  private $lastName;
  private $email;
  private $phone;
  private $fbID;
  private $hashedPassword;

  private $isAuthenticated;
  
  function __construct($id, $firstName, $lastName, $email, $phone, $fbID, $hashedPassword) {
    parent::__construct($id);

    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;
    $this->phone = $phone;
    $this->fbID = $fbID;
    $this->hashedPassword = $hashedPassword;

    $this->isAuthenticated = false;
  }

  public function getFirstName() { return $this->firstName; }

  public function getLastName() { return $this->lastName; }

  public function getEmail() { return $this->email; }

  public function getPhoneNumber() { return $this->phone; }

  public function isAuthenticated() {
    return $this->isAuthenticated;
  }

  public function authenticateByFBUser(FBUser $fbUser) {
    $this->isAuthenticated = $fbUser->isQueryingUser();
  }

  public function authenticateByPassword(PasswordHasher $hasher, $rawPassword) {
    //TODO implement
  }

  /**
   * @throws NotAuthenticatedException if the user has not been authenticated yet
   * @return a Session
   */
  public function logIn(Session $session) {
    //TODO implement
  }

  public function logOut(Session $session) {
    //TODO implement
  }

  public function equals($other) {
    return $this->id == $other->id;
  }

  public function __toString() {
    return "user$this->id";
  }
}

?>