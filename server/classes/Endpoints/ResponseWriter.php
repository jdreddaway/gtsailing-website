<?php

namespace GTSailing\Endpoints;

class ResponseWriter {

  public function writeException($ex) {
    $this->setStatusCode($ex->getStatusCode());
    print($ex->getMessage());
  }

  public function writeBody($body) {
    print($body);
  }

  public function setStatusCode($statusCode) {
    http_response_code($statusCode);
  }
}

?>