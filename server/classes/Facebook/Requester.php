<?php

namespace GTSailing\Facebook;

use Facebook\FacebookRequest;

class Requester {

  public function request($session, $method, $path) {
    $request = new FacebookRequest($session, "GET", "/me");
    $response = $request->execute();
    return $response;
  }
}

?>