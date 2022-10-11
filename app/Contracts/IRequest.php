<?php


namespace App\Contracts;


interface IRequest
{
    /**
     * @param string $method
     * @return mixed
     */
    public function sendRequest($method);
}
