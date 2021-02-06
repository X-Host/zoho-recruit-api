<?php

namespace Project88\Zoho\Recruit\Api\Tests\Unserializer;

use Project88\Zoho\Recruit\Api\Tests\TestCase;
use Project88\Zoho\Recruit\Api\Unserializer\JsonUnserializer;

class JsonUnserializerTest extends TestCase
{
    public function testImplementsUnserializerInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Unserializer\\JsonUnserializer'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Unserializer\\UnserializerInterface'
        ));
    }

    public function testUnserialize()
    {
        $unserializer = new JsonUnserializer();

        $unserializedData = $unserializer->unserialize(json_encode(array(
            'fake' => 'data'
        )));

        $this->assertEquals('data', $unserializedData['fake']);
    }
}
