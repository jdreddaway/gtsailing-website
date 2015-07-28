<?php

namespace GTSailing\Endpoints;

use GTSailing\Endpoints\NotFoundException;
use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Domain\Account\User;
use GTSailing\Domain\Facebook\InvalidFBSessionException;
use GTSailing\Domain\Facebook\FBUserRetriever;
use GTSailing\Domain\Security\NotLoggedInException;
use GTSailing\Domain\Security\Session;
use GTSailing\Repositories\DoesNotExistException;
use GTSailing\Repositories\Account\UserRepo;

class LoginEndpoint extends Endpoint {

  private $writer;
  private $fbUserRetriever;
  private $userRepo;
  private $session;

  function __construct(ResponseWriter $writer, FBUserRetriever $fbUserRetriever, UserRepo $userRepo, Session $session) {
    $this->writer = $writer;
    $this->fbUserRetriever = $fbUserRetriever;
    $this->userRepo = $userRepo;
    $this->session = $session;
  }

  public function options() {
    $this->returnNotImplemented();
  }

  public function get() {
    if ($this->session->userIsLoggedIn()) {
      $this->writer->writeBody("true");
    } else {
      $this->writer->writeBody('false');
    }
  }

  public function head() {
    $this->returnNotImplemented();
  }

  /**
   * Logs a user in to the system 
   * @returns 201 if the user is successfully logged in; 404 if the user is not in the GTSailing database
  */
  public function post() {
    if (!isset($_POST['accessToken'])) {
      throw new BadRequestException('accessToken was not set.');
    }

    try {
      $fbUser = $this->fbUserRetriever->getUserByFBAccessToken($_POST['accessToken']);
    } catch (InvalidFBSessionException $fbEx) {
      throw new BadRequestException($fbEx->getMessage(), $fbEx);
    }

    try {
      $gtUser = $fbUser->toUser($this->userRepo);
    } catch (DoesNotExistException $dne) {
      throw new NotFoundException($dne->getMessage(), $dne);
    }

    $gtUser->authenticateByFBUser($fbUser);
    $this->session->logUserIn($gtUser);

    $this->writer->setStatusCode(201);
  }

  public function put() {
    $this->returnNotImplemented();
  }

  public function delete() {
    $this->returnNotImplemented();
  }
}

?>