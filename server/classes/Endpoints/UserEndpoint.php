<?php

namespace GTSailing\Endpoints;

use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\GraphUser;

use GTSailing\Domain\Account\UserCreator;
use GTSailing\Domain\Facebook\FBUserRetriever;
use GTSailing\Domain\Facebook\InvalidFBSessionException;
use GTSailing\Repositories\DoesNotExistException;
use GTSailing\Repositories\Account\UserRepo;

class UserEndpoint extends Endpoint {

  private $fbUserRetriever;
  private $userCreator;
  private $serializer;
  private $responseWriter;

  public function __construct(FBUserRetriever $fbUserRetriever, UserCreator $userCreator, JsonSerializer $serializer, ResponseWriter $responseWriter) {
    $this->fbUserRetriever = $fbUserRetriever;
    $this->userCreator = $userCreator;
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
      $user = $this->fbUserRetriever->getUserByFBAccessToken($_GET['accessToken']);
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
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $fbID = $_POST['fbID'];
    
    $user = $this->userCreator->create($email, $firstName, $lastName, $phone, $fbID, $password);
    $body = $this->serializer->serialize(new UserResource($user));
    $this->responseWriter->writeBody($body);
  }

  public function put() {
    $this->returnNotImplemented();
  }

  public function delete() {
    $this->returnNotImplemented();
  }
}

?>