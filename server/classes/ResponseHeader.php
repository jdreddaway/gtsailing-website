<?php

namespace GTSailing;

class ResponseHeader {

  public function setLocation($newUrl) {
    header("Location: $newUrl");
  }
}

?>