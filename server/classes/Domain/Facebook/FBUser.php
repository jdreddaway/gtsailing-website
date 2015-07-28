<?php

namespace GTSailing\Domain\Facebook;

use Facebook\GraphUser;

use GTSailing\Repositories\Account\UserRepo;

class FBUser {

  private $graphUser;
  private $isQueryingUser;

  function __construct(GraphUser $graphUser, $isQueryingUser) {
    $this->isQueryingUser = $isQueryingUser;
    $this->graphUser = $graphUser;
  }

  public function isQueryingUser() { return $this->isQueryingUser; }

  public function toUser(UserRepo $userRepo) {
    return $userRepo->loadByFBID($this->graphUser->getId());
  }
  
}

?>