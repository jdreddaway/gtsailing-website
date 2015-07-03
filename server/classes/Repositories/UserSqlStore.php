<?php

namespace GTSailing\Repositories;

use \PDO;

class UserSqlStore extends SqlStore {

  function __construct(PDO $connection) {
    parent::__construct($connection);
  }

  public function loadByID($id) {
    $query = "SELECT * from Users where id=$id";
    $result = $this->connection->query($query);

    if ($result->rowCount() == 0) {
      throw new DoesNotExistException("Could not find user with ID $id.");
    }

    $row = $result->fetch();
    return $row;
  }

  public function loadByFBID($id) {
    $query = "SELECT * from Users where fb_id=$id";
    $result = $this->connection->query($query);

    if ($result->rowCount() == 0) {
      throw new DoesNotExistException("Could not find user with FB ID $id.");
    }

    $row = $result->fetch();
    return $row;
  }

  public function createUser($email, $firstName, $lastName, $phone, $hashedPassword, $fbID) {
    $query = "INSERT INTO Users (email, first_name, last_name, phone, password, fb_id)
      VALUES ('$email', '$firstName', '$lastName', '$phone', '$hashedPassword', $fbID)";
    $result = $this->connection->query($query);

    return $this->connection->lastInsertId();
  }
}

?>