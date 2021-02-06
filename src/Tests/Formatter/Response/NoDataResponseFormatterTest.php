<?php

namespace Project88\Zoho\Recruit\Api\Tests\Formatter\Response;

use Project88\Zoho\Recruit\Api\Formatter\Response\NoDataResponseFormatter;
use Project88\Zoho\Recruit\Api\Tests\TestCase;

class NoDataResponseFormatterTest extends TestCase
{
    public function testImplementsFormatterInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\Response\\NoDataResponseFormatter'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Formatter\\FormatterInterface'
        ));
    }

    public function testGetOutput()
    {
        $formatter = new NoDataResponseFormatter();

        $formatter->formatter(array(
            'fake' => 'Fake'
        ));

        $this->assertEmpty($formatter->getOutput());
    }
}
