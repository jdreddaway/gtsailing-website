<?php

use GTSailing\Repositories\UserRepo;

class UserRepoTest extends Tests\Repositories\DatabaseTestCase {

  public function testLoadByFBID() {
    $repo = new UserRepo(self::getPdo());
    $user = $repo->loadByFBID(828305298);
    $this->assertEquals(1, $user->getID());
  }

  /**
   * @expectedException GTSailing\Repositories\DoesNotExistException
   */
  public function testLoadByFBID_IDNotFound() {
    $repo = new UserRepo(self::getPdo());
    $user = $repo->loadByFBID(18);
  }
}

?>