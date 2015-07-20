<?php

namespace Tests\Domain\Account;

use Prophecy\Argument;

use Tests\DI\TestContainerBuilderFactory;
use Tests\Domain\Validation\ValidatorTest;
use Tests\Domain\Account\UserValidatorTest;

use GTSailing\Domain\Account\UserCreator;
use GTSailing\Repositories\UserSqlStore;
use GTSailing\Domain\Validation\InvalidValuesException;
use GTSailing\Domain\Account\UserValidator;

class UserCreatorTest extends \Tests\TestCase {

  function testCreate() {
    $userStoreProph = $this->prophesize(UserSqlStore::class);
    $userStoreProph->createUser(ValidatorTest::VALID_EMAIL, UserValidatorTest::VALID_FIRST_NAME,
      //TODO use hashed password
      UserValidatorTest::VALID_LAST_NAME, UserValidatorTest::VALID_PHONE, 'raw_password', 129421)
      ->willReturn(1057)
      ->shouldBeCalledTimes(1);

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $containerBuilder->addDefinitions([
      UserSqlStore::class => $userStoreProph->reveal()
    ]);
    $container = $containerBuilder->build();
    $creator = $container->get(UserCreator::class);

    $user = $creator->create(ValidatorTest::VALID_EMAIL, UserValidatorTest::VALID_FIRST_NAME,
      UserValidatorTest::VALID_LAST_NAME, UserValidatorTest::VALID_PHONE, 129421, 'raw_password');

    $this->assertEquals(1057, $user->getID());
    $this->assertEquals(ValidatorTest::VALID_EMAIL, $user->getEmail());
    $this->assertEquals(UserValidatorTest::VALID_FIRST_NAME, $user->getFirstName());
    $this->assertEquals(UserValidatorTest::VALID_LAST_NAME, $user->getLastName());
    $this->assertEquals(UserValidatorTest::VALID_PHONE, $user->getPhoneNumber());
  }

  function testCreate_InvalidEmail() {
    $this->assertThrowsInvalidValuesException(function($creator) {
      $creator->create(ValidatorTest::INVALID_EMAIL_NO_TLD, UserValidatorTest::VALID_FIRST_NAME,
        UserValidatorTest::VALID_LAST_NAME, UserValidatorTest::VALID_PHONE, 129421, 'raw_password');
      },
      array(UserValidator::INVALID_EMAIL_ERROR)
    );
  }

  function testCreate_InvalidFirstName() {
    $this->assertThrowsInvalidValuesException(function($creator) {
      $creator->create(ValidatorTest::VALID_EMAIL, UserValidatorTest::INVALID_FIRST_NAME_TOO_LONG,
        UserValidatorTest::VALID_LAST_NAME, UserValidatorTest::VALID_PHONE, 129421, 'raw_password');
      },
      array(UserValidator::FIRST_NAME_TOO_LONG_ERROR)
    );
  }

  function testCreate_AllFieldsInvalid() {
    $this->assertThrowsInvalidValuesException(function($creator) {
      $creator->create(ValidatorTest::INVALID_EMAIL_NO_TLD, UserValidatorTest::INVALID_FIRST_NAME_TOO_LONG,
        UserValidatorTest::VALID_LAST_NAME, UserValidatorTest::VALID_PHONE, 129421, 'raw_password');
      },
      //TODO add more errors
      array(UserValidator::INVALID_EMAIL_ERROR, UserValidator::FIRST_NAME_TOO_LONG_ERROR)
    );
  }

  /**
   * @param function(UserCreator) fn Calls the method that should throw the InvalidValesException.
   */
  function assertThrowsInvalidValuesException($fn, $expectedErrors) {
    $userStoreProph = $this->prophesize(UserSqlStore::class);
    $userStoreProph->createUser(
      Argument::any(), Argument::any(), Argument::any(), Argument::any(), Argument::any(), Argument::any(), Argument::any())
      ->shouldNotBeCalled();

    $containerBuilder = (new TestContainerBuilderFactory())->create($this->prophet);
    $containerBuilder->addDefinitions([
      UserSqlStore::class => $userStoreProph->reveal()
    ]);

    $container = $containerBuilder->build();
    $creator = $container->get(UserCreator::class);

    try {
      $fn($creator);
      $this->fail();
    } catch (InvalidValuesException $ive) {
      $this->assertSetEquals($expectedErrors, $ive->errorCodes);
    }
  }
}

?>