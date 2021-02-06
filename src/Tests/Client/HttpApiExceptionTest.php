<?php

namespace Project88\Zoho\Recruit\Api\Tests\Client;

use Project88\Zoho\Recruit\Api\Client\HttpApiException;
use Project88\Zoho\Recruit\Api\Tests\TestCase;

class HttpApiExceptionTest extends TestCase
{
    public function testInheritedAbstractException()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Client\\HttpApiException'
        );

        $this->assertEquals(
            'RuntimeException',
            $reflection->getParentClass()->getName()
        );
    }

    public function testGetMethods()
    {
        $exception = new HttpApiException('fake_message', 1, 'http://fake');

        $this->assertInstanceOf(
            '\\Project88\\Zoho\\Recruit\\Api\\Client\\HttpApiException',
            $exception
        );

        $this->assertEquals('fake_message', $exception->getMessage());

        $this->assertEquals(1, $exception->getCode());

        $this->assertEquals('http://fake', $exception->getUri());
    }
}
