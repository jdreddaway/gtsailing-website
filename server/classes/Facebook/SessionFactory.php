<?php

namespace GTSailing\Facebook;

use Facebook\FacebookSession;

class SessionFactory {

  public function create($accessToken) {
    return new FacebookSession($_GET['accessToken']);
  }
}

?>