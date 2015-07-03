<?php

use GTSailing\Repositories\UserSqlStore;

class UserSqlStoreTest extends Tests\Repositories\DatabaseTestCase {
  private $defaultMaxID = 1;

  public function testLoadByFBID() {
    $repo = new UserSqlStore($this->getPdo());
    $row = $repo->loadByFBID(828305298);
    $this->assertUserEquals($row, 1, 'jdreddaway@gatech.edu', 'JD', 'Reddaway', '7703565095', null, 828305298);
  }

  /**
   * @expectedException GTSailing\Repositories\DoesNotExistException
   * @expectedExceptionMessage Could not find user with FB ID 18.
   */
  public function testLoadByFBID_IDNotFound() {
    $repo = new UserSqlStore(self::getPdo());
    $user = $repo->loadByFBID(18);
  }

  public function testCreateUser() {
    $repo = new UserSqlStore($this->getPdo());
    $newID = $repo->createUser('email', 'firstName', 'lastName', 'phone', 'hashedPassword', 1998);

    $expectedID = $this->defaultMaxID + 1;
    $this->assertEquals($expectedID, $newID);
    $userRow = $repo->loadByFBID(1998);
    $this->assertUserEquals($userRow, $expectedID, 'email', 'firstName', 'lastName', 'phone', 'hashedPassword', 1998);
  }

  function testLoadByID() {
    $repo = new UserSqlStore($this->getPdo());
    $row = $repo->loadByID(1);
    $this->assertUserEquals($row, 1, 'jdreddaway@gatech.edu', 'JD', 'Reddaway', '7703565095', null, 828305298);
  }

  /**
   * @expectedException GTSailing\Repositories\DoesNotExistException
   * @expectedExceptionMessage Could not find user with ID 18.
   */
  public function testLoadByID_IDNotFound() {
    $repo = new UserSqlStore($this->getPdo());
    $user = $repo->loadByID(18);
  }

  private function assertUserEquals($userRow, $id, $email, $firstName, $lastName, $phone, $hashedPassword, $fbID) {
    $this->assertEquals($id, $userRow['id']);
    $this->assertEquals($email, $userRow['email']);
    $this->assertEquals($firstName, $userRow['first_name']);
    $this->assertEquals($lastName, $userRow['last_name']);
    $this->assertEquals($phone, $userRow['phone']);
    $this->assertEquals($hashedPassword, $userRow['password']);
    $this->assertEquals($fbID, $userRow['fb_id']);
  }
}

?>