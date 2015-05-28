<?php

namespace GTSailing\Repositories;

abstract class Repo {

  protected $connection;

  function __construct(\PDO $connection) {
    $this->connection = $connection;
  }
}

?>