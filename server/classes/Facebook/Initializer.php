<?php

namespace GTSailing\Facebook;

class Initializer {

  public function initialize() {
    requireOnce("/common/fb-init.php");
  }
}

?>