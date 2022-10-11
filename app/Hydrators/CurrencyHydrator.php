<?php


namespace App\Hydrators;


use App\Contracts\IEntity;
use App\Contracts\IHydrate;
use App\Entities\Currency;

class CurrencyHydrator implements IHydrate
{

    public static function hydrate(array $data): IEntity
    {
        $currency = new Currency();
        $currency->setName($data['name'] ?? "");
        $currency->setRate($data['rate'] ?? "");
        return $currency;
    }

}
