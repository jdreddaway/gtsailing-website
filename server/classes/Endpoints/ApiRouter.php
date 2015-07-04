<?php

namespace GTSailing\Endpoints;

class ApiRouter {

  function __construct(Endpoint $endpoint, ResponseWriter $responseWriter) {
    $this->endpoint = $endpoint;
    $this->responseWriter = $responseWriter;
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
    } catch (\GTSailing\Endpoints\RequestException $re) {
      $this->responseWriter->writeException($re);
      return;
    }
  }
}

?>