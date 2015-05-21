<?php

  require_once("test_init.php");

  class EndpointTest extends PHPUnit_Framework_TestCase {

    public function testReturnNotImplemented() {
      $endpoint = new MockEndpoint();
      $endpoint->publicReturnNotImplemented();

      $this->assertEquals(501, http_response_code());
    }
  }

  class MockEndpoint extends Endpoints\Endpoint {

    public function options() {
    }

    public function get() {
    }

    public function head() {
    }

    public function post() {
    }

    public function put() {
    }

    public function delete() {
    }

    public function publicReturnNotImplemented() {
      $this->returnNotImplemented();
    }

  }

?>