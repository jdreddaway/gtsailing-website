<?php

namespace GTSailing\Mills;

use Facebook\GraphUser;

use GTSailing\Facebook\Initializer;
use GTSailing\Facebook\Requester;
use GTSailing\Facebook\SessionFactory;
use GTSailing\Repositories\Account\UserRepo;

class UserMill {

  public function __construct(UserRepo $userRepo, SessionFactory $fbSessionFactory, Requester $fbRequester, Initializer $fbInitializer) {
    $this->userRepo = $userRepo;
    $this->fbSessionFactory = $fbSessionFactory;
    $this->fbRequester = $fbRequester;
    $this->fbInitializer = $fbInitializer;
  }

  /**
   * throws NotFoundException if the user is not in the database
  */
  function getUserByFBAccessToken($accessToken) {
    $this->fbInitializer->initialize();
    $session = $this->fbSessionFactory->create($accessToken);

    try {
      $session->validate();
    } catch (\Exception $ex) {
      // FacebookRequestException: Session not valid, Graph API returned an exception with the reason.
      // Exception: Graph API returned info, but it may mismatch the current app or have expired.
      // TODO: handle each exception differently. See https://developers.facebook.com/docs/php/FacebookRequestException/4.0.0
      error_log($ex->getMessage());
      throw new InvalidFBSessionException($ex->getMessage());
    }

    $response = $this->fbRequester->request($session, "GET", "/me");
    $user = $response->getGraphObject(GraphUser::className());
    $fbID = $user->getId();

    $gtUser = $this->userRepo->loadByFBID($fbID);

    return $gtUser;
  }

  public function createUser($email, $firstName, $lastName, $phone, $hashedPassword, $fbID) {
    return $this->userRepo->create($email, $firstName, $lastName, $phone, $hashedPassword, $fbID);
  }

}

?>