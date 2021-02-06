<?php

namespace Project88\Zoho\Recruit\Api\Unserializer;

class JsonUnserializer implements UnserializerInterface
{
    /**
     * @inheritdoc
     */
    public function unserialize($data)
    {
        return json_decode($data, true);
    }
}
