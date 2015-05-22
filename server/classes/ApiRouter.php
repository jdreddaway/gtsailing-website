<?php

namespace GTSailing;

use GTSailing\RequestException as RequestException;

class ApiRouter {

  function __construct($endpoint) {
    $this->endpoint = $endpoint;
  }

  /**
   * Calls the appropriate method on $endpoint to handle the request.
   *
   * @param Endpoint $endpoint
  */
  public function handleRequest() {
    $method = $_SERVER['REQUEST_METHOD'];

    try {
      switch ($method) {
        case 'OPTIONS':
          $this->endpoint->options();
          break;
        case 'GET':
          $this->endpoint->get();
          break;
        case 'HEAD':
          $this->endpoint->head();
          break;
        case 'POST':
          $this->endpoint->post();
          break;
        case 'PUT':
          $this->endpoint->put();
          break;
        case 'DELETE':
          $this->endpoint->delete();
          break;
        default:
          throw new \Exception("Unrecognized method $method");
      }
    } catch (RequestException $re) {
      return;
    }
  }
}

?>