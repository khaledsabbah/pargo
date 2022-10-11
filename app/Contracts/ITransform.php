<?php

namespace App\Contracts;


/**
 * Interface ITransform
 * @package App\Contracts
 */
interface ITransform
{
    /**
     * @param $data
     * @return mixed
     */
    public static function transform(array $data): array;

}
