<?php

namespace GTSailing\Domain;

class User {
  
  private $id;

  function __construct($id) {
    $this->id = $id;
  }

  public function getID() {
    return $this->id;
  }
}

?>