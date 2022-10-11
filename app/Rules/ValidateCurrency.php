<?php

namespace App\Rules;

use App\Factory\ExchangeRateFactory;
use Illuminate\Contracts\Validation\InvokableRule;

class ValidateCurrency implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $rateService = ExchangeRateFactory::Instantiate("exchange_rate");
        $currencies= $rateService->currencies();

        $filter= $currencies->filter(function ($currency)use($value){
            return $currency->getName()==$value;
        });
        if($filter->count() == 0)
            $fail(__("Currency { $value } Is Not Available"));
    }
}
