<?php

namespace GTSailing\Endpoints;

use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Mills\LoginMill;

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
  */
  public function post() {
    if (!isset($_POST['accessToken'])) {
      throw new BadRequestException('accessToken was not set.');
    }

    $this->loginMill->logInByFBAccessToken($_POST['accessToken']);
  }

  public function put() {
    $this->returnNotImplemented();
  }

  public function delete() {
    $this->returnNotImplemented();
  }
}

?>