<?php

use GTSailing\Endpoints\ArgumentVerifier;

class ArgumentVerifierTest extends Tests\TestCase {

  function testVerifyPostKeysExist_AllExist_One() {
      $exFactoryProph = $this->prophesize('GTSailing\Endpoints\BadRequestExceptionFactory');
      $endpoint = new ArgumentVerifier($exFactoryProph->reveal());

      $_POST['one'] = 'hey';
      $endpoint->verifyPostKeysExist(['one']);
    }

  function testVerifyPostKeysExist_AllMissing_One() {
    $exFactoryProph = $this->prophesize('GTSailing\Endpoints\BadRequestExceptionFactory');
    $exFactoryProph->throwMissingPostFieldsException(['one'])->shouldBeCalled();
    $endpoint = new ArgumentVerifier($exFactoryProph->reveal());
    $endpoint->verifyPostKeysExist(['one']);
  }

  function testVerifyPostKeysExist_AllMissing_Multiple() {
    $exFactoryProph = $this->prophesize('GTSailing\Endpoints\BadRequestExceptionFactory');
    $exFactoryProph->throwMissingPostFieldsException(['one', 'two', 'three'])->shouldBeCalled();
    $endpoint = new ArgumentVerifier($exFactoryProph->reveal());
    $endpoint->verifyPostKeysExist(['one', 'two', 'three']);
  }

  function testVerifyPostKeysExist_SomeMissing() {
    $exFactoryProph = $this->prophesize('GTSailing\Endpoints\BadRequestExceptionFactory');
    $exFactoryProph->throwMissingPostFieldsException(['one', 'two'])->shouldBeCalled();
    $endpoint = new ArgumentVerifier($exFactoryProph->reveal());

    $_POST['three'] = 'something';
    $endpoint->verifyPostKeysExist(['one', 'two', 'three']);
  }
}

?>