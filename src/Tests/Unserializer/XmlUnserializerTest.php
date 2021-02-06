<?php

namespace Project88\Zoho\Recruit\Api\Tests\Unserializer;

use Project88\Zoho\Recruit\Api\Tests\TestCase;
use Project88\Zoho\Recruit\Api\Unserializer\XmlUnserializer;

class XmlUnserializerTest extends TestCase
{
    public function testImplementsUnserializerInterface()
    {
        $reflection = new \ReflectionClass(
            '\\Project88\\Zoho\\Recruit\\Api\\Unserializer\\XmlUnserializer'
        );

        $this->assertTrue($reflection->implementsInterface(
            '\\Project88\\Zoho\\Recruit\\Api\\Unserializer\\UnserializerInterface'
        ));
    }

    /**
     * @expectedException \LogicException
     */
    public function testUnserialize()
    {
        $unserializer = new XmlUnserializer();

        $unserializer->unserialize('');
    }
}
