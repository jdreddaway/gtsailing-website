<?php

namespace GTSailing\Domain\Account;

use GTSailing\Repositories\UserSqlStore;
use GTSailing\Domain\Validation\InvalidValuesException;

class UserCreator {

  private $userStore;
  private $validator;

  function __construct(UserSqlStore $userStore, UserValidator $validator) {
    $this->userStore = $userStore;
    $this->validator = $validator;
  }

  function create($email, $firstName, $lastName, $phone, $fbID, $rawPassword) {
    $errors = $this->validator->validateEmail($email);
    $errors = array_merge($errors, $this->validator->validateFirstName($firstName));

    if (!empty($errors)) {
      throw new InvalidValuesException($errors);
    }

    //TODO hash password
    $hashedPassword = $rawPassword;

    $id = $this->userStore->createUser($email, $firstName, $lastName, $phone, $hashedPassword, $fbID);
    return new User($id, $firstName, $lastName, $email, $phone, $fbID, $hashedPassword);
  }
}

?>