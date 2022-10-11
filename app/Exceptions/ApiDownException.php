<?php

namespace App\Exceptions;

use Exception;

class ApiDownException extends Exception
{

    /**
     * @var string
     */
    private $url;

    /**
     * ApiDownException constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->setUrl($url);
        $this->setMessage("API Down!!. Couldn't Connect to This URL: " . $this->getUrl());
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

}
