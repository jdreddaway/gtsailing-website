<?php

namespace GTSailing\Endpoints;

/**
 * This class mediates the Domain/Mills layers and the Endpoint layer.
 * Technically it should implement some interface in Domain or Mills
 */
class RequestExceptionFactory {

  public function createBadArgument($message) {
    return new BadRequestException($message);
  }
}

?>