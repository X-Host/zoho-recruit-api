<?php

namespace Project88\Zoho\Recruit\Api\Tests\Formatter\Response;

use GuzzleHttp\Psr7\Response;
use Project88\Zoho\Recruit\Api\Formatter\Response\DownloadFileResponseFormatter;
use Project88\Zoho\Recruit\Api\Formatter\Response\ErrorResponseFormatter;
use Project88\Zoho\Recruit\Api\Tests\TestCase;

class DownloadFileResponseFormatterTest extends TestCase
{
    public function testImplementsFormatterInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\DownloadFileResponseFormatter'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\FormatterInterface'
        ));
    }

    /**
     * @expectedException \Project88\Zoho\Recruit\Api\Client\HttpApiException
     */
    public function testErrorFormatterClass()
    {
        $formatter = $this->getDownloadFileResponseFormatterMock(array('getErrorResponseFormatter'));

        $formatter
            ->expects($this->once())
            ->method('getErrorResponseFormatter')
            ->willReturn(new ErrorResponseFormatter())
        ;

        $formatter->formatter(array(
            'module' => 'Candidate',
            'method' => 'getPhoto',
            'params' => null,
            'data' => array(
                'download' => new Response(200, array('Content-Type' => 'application/json'), 'fake_binary')
            )
        ));
    }

    public function testGetErrorResponseFormatter()
    {
        $formatter = new DownloadFileResponseFormatter();

        $this->assertInstanceOf(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\ErrorResponseFormatter',
            $this->invokeMethod($formatter, 'getErrorResponseFormatter')
        );
    }

    public function testGetOutput()
    {
        $formatter = new DownloadFileResponseFormatter();

        $formatter->formatter(array(
            'data' => array(
                'download' => new Response(200, array('Content-Type' => 'application/x-downLoad'), 'fake_binary')
            )
        ));

        $this->assertTrue(is_resource($formatter->getOutput()));
    }

    /**
     * @param  array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getDownloadFileResponseFormatterMock(array $methods)
    {
        return $this->getMockBuilder('\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\DownloadFileResponseFormatter')
            ->disableOriginalConstructor()
            ->setMethods($methods)
            ->getMock()
        ;
    }
}
