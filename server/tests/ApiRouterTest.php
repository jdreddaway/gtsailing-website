<?php

require_once("test_init.php");

class ApiRouterTest extends PHPUnit_Framework_TestCase {

  public function testHandleRequest_Get() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('get');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'GET';
    $router->handleRequest();
  }

  public function testHandleRequest_Options() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('options');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'OPTIONS';
    $router->handleRequest();
  }

  public function testHandleRequest_Post() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('post');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $router->handleRequest();
  }

  public function testHandleRequest_Put() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('put');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'PUT';
    $router->handleRequest();
  }

  public function testHandleRequest_Head() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('head');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'HEAD';
    $router->handleRequest();
  }

  public function testHandleRequest_Delete() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('delete');

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'DELETE';
    $router->handleRequest();
  }

  /**
   * @expectedException Exception
  */
  public function testHandleRequest_UnknownMethod() {
    $router = new ApiRouter(null);
    $_SERVER['REQUEST_METHOD'] = 'UNKNOWN';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Get() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('get')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'GET';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Post() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('post')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Head() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('head')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'HEAD';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Options() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('options')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'OPTIONS';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Put() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('put')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'PUT';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Delete() {
    $endpointMock = $this->getMockForAbstractClass('Endpoints\Endpoint');
    $endpointMock->method('delete')->will($this->throwException(new RequestException()));

    $router = new ApiRouter($endpointMock);

    $_SERVER['REQUEST_METHOD'] = 'DELETE';
    $router->handleRequest();
  }
}

?>