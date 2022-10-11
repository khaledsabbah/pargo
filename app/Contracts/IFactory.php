<?php

namespace App\Contracts;


/**
 * Interface IFactory
 *
 * @package App\Contracts
 */
interface IFactory
{

    /**
     * @param string $serviceName
     * @param string $nameSpace
     * @param string $separator
     * @return mixed
     */
    static function Instantiate(string $serviceName, string $nameSpace = '', $separator="_");
}
