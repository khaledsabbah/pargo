<?php

namespace App\Contracts;


/**
 * Interface IHydrate
 * @package App\Contracts
 */
interface IHydrate
{
    /**
     * @param array $data
     * @return mixed
     */
    public static function hydrate(array $data): IEntity;

}
