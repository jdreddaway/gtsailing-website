<?php

class ResponseHeader {

  public function setLocation($newUrl) {
    header("Location: $newUrl");
  }
}

?>