<?php

namespace GTSailing\Mills;

use GTSailing\Repositories\SessionRepo;
use GTSailing\Mills\UserMill;

class LoginMill {

  private $sessionRepo;
  private $userMill;

  function __construct(SessionRepo $sessionRepo, UserMill $userMill) {
    $this->sessionRepo = $sessionRepo;
    $this->userMill = $userMill;
  }

  public function logInByFBAccessToken($accessToken) {
    $user = $this->userMill->getUserByFBAccessToken($accessToken);
    $session = $this->sessionRepo->getSession();
    $session->logUserIn($user);
  }

  public function getLoggedInUser() {
    $session = $this->sessionRepo->getSession();
    return $session->getLoggedInUser();
  }

  public function logout() {
    //TODO implement
  }

}

?>