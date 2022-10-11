<?php

namespace App\Exceptions;

use Exception;

class ServiceNotFoundException extends Exception
{
    /**
     * @var string
     */
    protected $message = "Service Not Found Exception";
    /**
     * @var string
     */
    protected $ServiceName;

    /**
     * StoreNotFoundException constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setServiceName($name);
        $this->setMessage("Service ( " . $this->getServiceName() . " ) Not Found Exception");
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->ServiceName;
    }

    /**
     * @param string $ServiceName
     */
    public function setServiceName(string $ServiceName): void
    {
        $this->ServiceName = $ServiceName;
    }


}
