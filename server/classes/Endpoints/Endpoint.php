<?php

namespace GTSailing\Endpoints;

abstract class Endpoint {

  public abstract function options();

  public abstract function get();

  public abstract function head();

  public abstract function post();

  public abstract function put();

  public abstract function delete();

  // public function trace() http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html#sec9.8

  protected function returnNotImplemented() {
    http_response_code(501);
  }
}
?>