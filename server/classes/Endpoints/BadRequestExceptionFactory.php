<?php

namespace GTSailing\Endpoints;

class BadRequestExceptionFactory {

  public function throwMissingPostFieldsException($missingFields) {
    throw new BadRequestException("The following fields are missing and must be set: [" . implode(', ', $missingFields) . "]");
  }
}

?>