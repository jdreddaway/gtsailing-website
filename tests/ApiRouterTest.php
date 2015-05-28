<?php

use GTSailing\ApiRouter;
use GTSailing\Endpoints\BadRequestException;
use GTSailing\Endpoints\Endpoint;

class ApiRouterTest extends PHPUnit_Framework_TestCase {

  public function testHandleRequest_Get() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('get');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'GET';
    $router->handleRequest();
  }

  public function testHandleRequest_Options() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('options');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'OPTIONS';
    $router->handleRequest();
  }

  public function testHandleRequest_Post() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('post');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $router->handleRequest();
  }

  public function testHandleRequest_Put() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('put');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'PUT';
    $router->handleRequest();
  }

  public function testHandleRequest_Head() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('head');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'HEAD';
    $router->handleRequest();
  }

  public function testHandleRequest_Delete() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $endpointMock->expects($this->once())->method('delete');

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'DELETE';
    $router->handleRequest();
  }

  /**
   * @expectedException Exception
  */
  public function testHandleRequest_UnknownMethod() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();

    $router = new ApiRouter($endpointMock, $writerMock);
    $_SERVER['REQUEST_METHOD'] = 'UNKNOWN';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Get() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("huh");
    $endpointMock->method('get')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'GET';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Post() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("bad");
    $endpointMock->expects($this->once())->method('post')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'POST';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Head() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("bad");
    $endpointMock->expects($this->once())->method('head')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'HEAD';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Options() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("bad");
    $endpointMock->expects($this->once())->method('options')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'OPTIONS';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Put() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("bad");
    $endpointMock->expects($this->once())->method('put')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'PUT';
    $router->handleRequest();
  }

  public function testHandleBadRequest_Delete() {
    $endpointMock = $this->getMockForAbstractClass('GTSailing\Endpoints\Endpoint');
    $ex = new BadRequestException("bad");
    $endpointMock->expects($this->once())->method('delete')->will($this->throwException($ex));

    $writerMock = $this->getMockBuilder('GTSailing\Endpoints\ResponseWriter')->setMethods(array('writeException'))->getMock();
    $writerMock->expects($this->once())->method('writeException')->with($ex);

    $router = new ApiRouter($endpointMock, $writerMock);

    $_SERVER['REQUEST_METHOD'] = 'DELETE';
    $router->handleRequest();
  }
}

?>