<?php

namespace Project88\Zoho\Recruit\Api\Formatter;

use Project88\Zoho\Recruit\Api\Client\HttpApiException;
use Project88\Zoho\Recruit\Api\Formatter\Response\ErrorResponseFormatter;

abstract class AbstractFormatter implements FormatterInterface
{
    /**
     * @var string
     */
    protected $module;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * @var array
     */
    protected $originalData;

    /**
     * @param string $module
     * @param string $method
     */
    protected function __construct($module, $method)
    {
        $this->module       = $module;
        $this->method       = $method;
        $this->formatter    = null;
        $this->originalData = array();
    }

    /**
     * @param string $module
     * @param string $method
     *
     * @return AbstractFormatter
     */
    public static function create($module, $method)
    {
        return new static($module, $method);
    }

    /**
     * @param  string $module
     *
     * @return bool
     */
    protected function isModule($module)
    {
        return $this->module === $module;
    }

    /**
     * @return string
     */
    protected function getModule()
    {
        return $this->module;
    }

    /**
     * @param  string $method
     *
     * @return bool
     */
    protected function isMethod($method)
    {
        return $this->method === $method;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return $this->method;
    }

    /**
     * @param FormatterInterface $formatter
     *
     * @return AbstractFormatter
     */
    protected function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * @return FormatterInterface
     */
    protected function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @return array
     */
    protected function getOriginalData()
    {
        return $this->originalData;
    }

    /**
     * @inheritdoc
     */
    public function getOutput()
    {
        $data = is_null($this->formatter)
            ? $this->getOriginalData()
            : $this->getFormatter()->getOutput()
        ;

        if ($this->getFormatter() instanceof ErrorResponseFormatter) {
            throw new HttpApiException(
                $data['message'],
                $data['code'],
                $data['uri']
            );
        }

        return $data;
    }
}
