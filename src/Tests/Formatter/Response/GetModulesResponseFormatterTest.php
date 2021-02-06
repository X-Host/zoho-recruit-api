<?php

namespace Project88\Zoho\Recruit\Api\Tests\Formatter\Response;

use Project88\Zoho\Recruit\Api\Formatter\Response\GetModulesResponseFormatter;
use Project88\Zoho\Recruit\Api\Tests\TestCase;

class GetModulesResponseFormatterTest extends TestCase
{
    public function testImplementsFormatterInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\GetModulesResponseFormatter'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\FormatterInterface'
        ));
    }

    public function testGetOutput()
    {
        $formatter = new GetModulesResponseFormatter();

        $formatter->formatter(array(
            'data' => array(
                'response'   => array(
                    'result' => array(
                        array(
                            'sl'      => 'fake',
                            'content' => 'fakeValue'
                        )
                    ),
                ),
            ),
        ));

        $output = $formatter->getOutput();

        $this->assertEquals('fakeValue', $output[0]['fake']);
    }
}
