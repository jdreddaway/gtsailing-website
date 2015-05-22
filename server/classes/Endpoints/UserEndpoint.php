<?php

namespace GTSailing\Endpoints;

use GTSailing\Endpoints\Endpoint as Endpoint;

class UserEndpoint extends Endpoint {

  public function options() {
    $this->returnNotImplemented();
  }

  /**
   * Returns the user from GT Sailing's database
  */
  public function get() {
    $this->returnNotImplemented();
  }

  public function head() {
    $this->returnNotImplemented();
  }

  public function post() {
    $this->returnNotImplemented();
  }

  public function put() {
    $this->returnNotImplemented();
  }

  public function delete() {
    $this->returnNotImplemented();
  }
}

?>