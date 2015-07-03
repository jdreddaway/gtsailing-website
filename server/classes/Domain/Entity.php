<?php

namespace GTSailing\Domain;

abstract class Entity {

  function __construct($id) {
    $this->id = $id;
  }

  function getID() {
    return $this->id;
  }
}

?>