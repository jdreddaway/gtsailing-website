<?php

namespace GTSailing\Repositories;

use \PDO;
use GTSailing\Domain\User;

class UserRepo extends Repo {

  function __construct(PDO $connection) {
    parent::__construct($connection);
  }

  public function loadByFBID($id) {
    $result = $this->connection->query("SELECT * from Users where fb_id=$id");

    if ($result->rowCount() == 0) {
      throw new DoesNotExistException("Could not find user with FB ID $id.");
    }

    $row = $result->fetch();
    return new User($row['id']);
  }
}

?>