<?php
namespace App\Utils\CurrencyExchange;


use App\Hydrators\CurrencyHydrator;
use App\Utils\RequestBuilder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ExchangeRate extends RequestBuilder
{

    const API_BASE_URL = 'https://api.apilayer.com/exchangerates_data';

    /**
     * @return string
     */
    public function getUri(): string
    {
        return self::API_BASE_URL . parent::getUri();
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return parent::getHeaders()+
            [
            "apikey"=>env("EXCHANGE_RATES_API_KEY"),
            "Content-Type"=>"application/json"
            ];
    }


    public function currencies()
    {
        return Cache::get('currencies-'.Carbon::today()->format("d-m-Y"), function () {
            $currencyResponse= $this->setUri("/latest")
                ->sendRequest();
            $currencies=collect();
            foreach ($currencyResponse['rates'] as $currencyName=>$currencyRate){
                $currencies->push(CurrencyHydrator::hydrate(["name"=>$currencyName,"rate"=>$currencyRate]));
            }
            return $currencies;
        });

    }

    public function exchangeRateWithDateRage($currency, $startDate, $endDate)
    {
        return $currencyResponse= $this->setUri("/timeseries")
            ->setQueryParams(['start_date'=>$startDate, "end_date"=>$endDate, "base"=>$currency])
            ->sendRequest();

    }
}
