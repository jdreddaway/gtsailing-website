<?php

use GTSailing\Endpoints\ResponseWriter;
use GTSailing\Endpoints\RequestException;

class ResponseWriterTest extends PHPUnit_Framework_TestCase {

  function testWriteException() {
    $exMock = $this->getMockBuilder('RequestException')
      ->setMethods(array('getStatusCode', 'getMessage'))
      ->disableOriginalConstructor()
      ->getMock();
    $exMock->expects($this->once())->method('getStatusCode')->willReturn(414);
    $exMock->expects($this->once())->method('getMessage')->willReturn('sup homie');

    $writer = new ResponseWriter();
    $writer->writeException($exMock);

    $this->assertEquals(414, http_response_code());
  }

  function testWriteBody() {
    $writer = new ResponseWriter();
    $writer->writeBody('hai');
    //can't really assert that something was printed, but at least checks that the method exists
  }

  function testSetStatusCode() {
    $writer = new ResponseWriter();
    $writer->setStatusCode(213);
    $this->assertEquals(213, http_response_code());
  }
}

?>