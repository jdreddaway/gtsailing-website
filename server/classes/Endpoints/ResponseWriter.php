<?php

namespace GTSailing\Endpoints;

/**
 * This class interacts with PHP lanuage features, therefore making it difficult to test.
 * Try to keep testable logic out of this class.
 */
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