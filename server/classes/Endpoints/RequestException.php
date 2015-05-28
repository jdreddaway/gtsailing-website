<?php

namespace GTSailing\Endpoints;

/**
 * Indicates that the request had problems and that the server should respond immediately.
*/
abstract class RequestException extends \Exception {

  private $statusCode;

  function __construct($statusCode, $message) {
    parent::__construct($message);
    $this->statusCode = $statusCode;
  }

  public function getStatusCode() {
    return $this->statusCode;
  }
}

?>