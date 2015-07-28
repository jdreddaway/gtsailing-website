<?php

namespace Tests\Domain\Facebook;

use Facebook\GraphUser;

use GTSailing\Domain\Facebook\FBUser;
use GTSailing\Repositories\Account\UserRepo;

use Prophecy\Prophet;

use Tests\Repositories\Account\UserRepoTest;

class FBUserTest extends \Tests\TestCase {
  
  function testIsQueryingUser_True() {
    $user = self::createQueryingFBUser($this->prophet);
    $this->assertTrue($user->isQueryingUser());
  }

  function testIsQueryingUser_False() {
    $user = self::createNonQueryingFBUser($this->prophet);
    $this->assertFalse($user->isQueryingUser());
  }

  function testToUser() {
    $fbUser = self::createQueryingFBUser($this->prophet);
    UserRepoTest::setUpDiForLoad($this->prophet, $this->containerBuilder);
    $userRepo = $this->containerBuilder->build()->get(UserRepo::class);
    $user = $fbUser->toUser($userRepo);
    $this->assertEquals(UserRepoTest::createDefaultUser(), $user);
  }

  public static function createQueryingFBUser(Prophet $prophet) {
    $graphUserProph = $prophet->prophesize(GraphUser::class);
    $graphUserProph->getId()->willReturn(UserRepoTest::FB_ID);
    return new FBUser($graphUserProph->reveal(), true);
  }

  public static function createNonQueryingFBUser(Prophet $prophet) {
    $graphUserProph = $prophet->prophesize(GraphUser::class);
    return new FBUser($graphUserProph->reveal(), false);
  }
}

?>