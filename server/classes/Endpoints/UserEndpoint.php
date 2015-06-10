<?php

namespace GTSailing\Endpoints;

use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphUser;

use GTSailing\Mills\UserMill;
use GTSailing\Mills\InvalidFBSessionException;
use GTSailing\Repositories\DoesNotExistException;

class UserEndpoint extends Endpoint {

  public function __construct(UserMill $userMill, JsonSerializer $serializer, ResponseWriter $responseWriter) {
    $this->userMill = $userMill;
    $this->serializer = $serializer;
    $this->responseWriter = $responseWriter;
  }

  public function options() {
    $this->returnNotImplemented();
  }

  /**
   * Returns the user from GT Sailing's database
  */
  public function get() {
    if (!isset($_GET['accessToken'])) {
      throw new BadRequestException('accessToken query parameter must be set.');
    }

    try {
      $user = $this->userMill->getUserByFBAccessToken($_GET['accessToken']);
    } catch (InvalidFBSessionException $fbEx) {
      throw new BadRequestException($fbEx->getMessage(), $fbEx);
    } catch (DoesNotExistException $dne) {
      throw new NotFoundException($dne->getMessage(), $dne);
    }

    $userResource = new UserResource($user);
    $body = $this->serializer->serialize($userResource);

    $this->responseWriter->setStatusCode(200);
    $this->responseWriter->writeBody($body);
  }

  public function head() {
    $this->returnNotImplemented();
  }

  public function post() {
    $this->returnNotImplemented();
  }

  public function put() {
    $this->returnNotImplemented();
  }

  public function delete() {
    $this->returnNotImplemented();
  }
}

?>