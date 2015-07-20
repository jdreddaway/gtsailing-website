<?php

namespace Tests\Repositories\Account;

use Prophecy\Prophet;

use Tests\DI\TestContainerBuilderFactory;

use DI\ContainerBuilder;
use GTSailing\Domain\Account\User;
use GTSailing\Repositories\Account\UserRepo;
use GTSailing\Repositories\UserSqlStore;

class UserRepoTest extends \Tests\TestCase {

  const EMAIL = 'email@gtsailing.org';
  const FIRST_NAME = 'JD';
  const LAST_NAME = 'Reddaway';
  const PHONE = '7701234567';
  const PASSWORD = 'password';
  const HASHED_PASSWORD = 'hashedPass';
  const FB_ID = 19898;
  const GT_ID = 57;

  function testLoadByID() {
    $containerBuilder = (new TestContainerBuilderFactory)->create($this->prophet);
    $container = self::setUpDiForLoad($this->prophet, $containerBuilder)->build();

    $repo = $container->get(UserRepo::class);
    $user = $repo->loadByID(self::GT_ID);

    $this->assertEquals(self::GT_ID, $user->getID());
    $this->assertEquals(self::FIRST_NAME, $user->getFirstName());
    $this->assertEquals(self::LAST_NAME, $user->getLastName());
    $this->assertEquals(self::EMAIL, $user->getEmail());
    $this->assertEquals(self::PHONE, $user->getPhoneNumber());
    $this->assertEquals(self::FB_ID, $user->getFBID());
  }

  function testCreate() {
    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $container = self::setUpDIForCreate($this->prophet, $containerBuilder)->build();

    $repo = $container->get(UserRepo::class);
    $id = $repo->create(self::EMAIL, self::FIRST_NAME, self::LAST_NAME, self::PHONE, self::PASSWORD, self::FB_ID);
    $this->assertEquals(self::GT_ID, $id);
  }

  /**
   * @return $builder
   */
  public static function setUpDIForCreate(Prophet $prophet, ContainerBuilder $builder) {
    $storeProph = $prophet->prophesize('GTSailing\Repositories\UserSqlStore');
    $storeProph->createUser(
        self::EMAIL, self::FIRST_NAME, self::LAST_NAME, self::PHONE, self::PASSWORD, self::FB_ID)
      ->willReturn(self::GT_ID)
      ->shouldBeCalledTimes(1);
    self::setUpStoreProphForLoad($storeProph);

    $builder->addDefinitions([
      UserSqlStore::class => $storeProph->reveal()
    ]);

    return $builder;
  }

  /**
   * @return $builder
   */
  public static function setUpDiForLoad(Prophet $prophet, ContainerBuilder $builder) {
    $storeProph = $prophet->prophesize(UserSqlStore::class);
    self::setUpStoreProphForLoad($storeProph);

    $builder->addDefinitions([
      UserSqlStore::class => $storeProph->reveal()
    ]);

    return $builder;
  }

  /**
   * @param $storeProph An ObjectProphecy representing a UserSqlStore
   * @return $storeProph
   */
  private static function setUpStoreProphForLoad($storeProph) {
    $row = array(
      'id' => self::GT_ID,
      'first_name' => self::FIRST_NAME,
      'last_name' => self::LAST_NAME,
      'email' => self::EMAIL,
      'phone' => self::PHONE,
      'fb_id' => self::FB_ID,
      'password' => self::HASHED_PASSWORD
    );
    $storeProph->loadByID(self::GT_ID)->willReturn($row);
    $storeProph->loadByFBID(self::FB_ID)->willReturn($row);
    return $storeProph;
  }
}

?>