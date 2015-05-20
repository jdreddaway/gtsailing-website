<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/../includes/common/server-scripts.php");

class UserEndpoint extends Endpoint {

  public function options() {
    $this->returnNotImplemented();
  }

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

handleApiRequest(new UserEndpoint());
?>