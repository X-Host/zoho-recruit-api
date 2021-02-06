<?php

namespace Project88\Zoho\Recruit\Api\Tests\Formatter\Response;

use Project88\Zoho\Recruit\Api\Formatter\Response\ErrorResponseFormatter;
use Project88\Zoho\Recruit\Api\Tests\TestCase;

class ErrorResponseFormatterTest extends TestCase
{
    public function testImplementsFormatterInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\ErrorResponseFormatter'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\FormatterInterface'
        ));
    }

    public function testGetOutput()
    {
        $formatter = new ErrorResponseFormatter();

        $formatter->formatter(array(
            'data' => array(
                'response'  => array(
                    'error' => array(
                        'code'    => '1',
                        'message' => ' MyFakeError',
                    ),
                    'uri'   => 'http://fake '
                ),
            ),
        ));

        $output = $formatter->getOutput();

        $this->assertEquals(1, $output['code']);

        $this->assertTrue(is_int($output['code']));

        $this->assertEquals('MyFakeError', $output['message']);

        $this->assertEquals('http://fake', $output['uri']);
    }
}
