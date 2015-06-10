<?php

namespace GTSailing\Endpoints;

/**
 * Indicates that the request had problems and that the server should respond immediately.
*/
abstract class RequestException extends \Exception {

  private $statusCode;

  function __construct($statusCode, $message, \Exception $previous = null) {
    parent::__construct($message, 0, $previous);
    $this->statusCode = $statusCode;
  }

  public function getStatusCode() {
    return $this->statusCode;
  }
}

?>