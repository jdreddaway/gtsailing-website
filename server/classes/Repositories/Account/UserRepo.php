<?php

namespace GTSailing\Repositories\Account;

use GTSailing\Repositories\UserSqlStore;
use GTSailing\Domain\Account\User;

class UserRepo {

  private $store;

  function __construct(UserSqlStore $store) {
    $this->store = $store;
  }

  public function loadByID($id) {
    $row = $this->store->loadByID($id);

    return new User($row['id'], $row['first_name'], $row['last_name'], $row['email'],
        $row['phone'], $row['fb_id'], $row['password']);
  }

  public function create($email, $firstName, $lastName, $phone, $hashedPassword, $fbID) {
    return $this->store->createUser($email, $firstName, $lastName, $phone, $hashedPassword, $fbID);
  }
}

?>