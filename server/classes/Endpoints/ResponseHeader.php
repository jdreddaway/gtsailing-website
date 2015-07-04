<?php

namespace GTSailing\Endpoints;

class ResponseHeader {

  public function setLocation($newUrl) {
    header("Location: $newUrl");
  }
}

?>