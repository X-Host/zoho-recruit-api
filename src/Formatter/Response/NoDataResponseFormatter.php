<?php

namespace Project88\Zoho\Recruit\Api\Formatter\Response;

use Project88\Zoho\Recruit\Api\Formatter\FormatterInterface;

class NoDataResponseFormatter implements FormatterInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @inheritdoc
     */
    public function formatter(array $data)
    {
        $this->data = array();
    }

    /**
     * @inheritdoc
     */
    public function getOutput()
    {
        return $this->data;
    }
}
