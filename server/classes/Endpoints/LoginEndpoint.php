<?php

namespace GTSailing\Endpoints;

use GTSailing\Endpoints\NotFoundException;
use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Mills\LoginMill;
use GTSailing\Mills\InvalidFBSessionException;
use GTSailing\Repositories\DoesNotExistException;

class LoginEndpoint extends Endpoint {

  function __construct(ResponseWriter $writer, LoginMill $loginMill) {
    $this->writer = $writer;
    $this->loginMill = $loginMill;
  }

  public function options() {
    $this->returnNotImplemented();
  }

  /**
   * 
  */
  public function get() {
    try {
      $this->loginMill->getLoggedInUser();
      $this->writer->writeBody("true");
    } catch (\GTSailing\Domain\NotLoggedInException $nlie) {
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
      $this->loginMill->logInByFBAccessToken($_POST['accessToken']);
    } catch (InvalidFBSessionException $fbEx) {
      throw new BadRequestException($fbEx->getMessage(), $fbEx);
    } catch (DoesNotExistException $dne) {
      throw new NotFoundException($dne->getMessage(), $dne);
    }

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