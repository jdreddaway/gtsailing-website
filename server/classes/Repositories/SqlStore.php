<?php

namespace GTSailing\Repositories;

abstract class SqlStore {

  protected $connection;

  function __construct(\PDO $connection) {
    $this->connection = $connection;
  }
}

?>