<?php


namespace App\Services;


use App\Factory\ExchangeRateFactory;
use App\Repositories\CurrencyExchangeRepository;
use Illuminate\Support\Facades\Log;

class CurrencyExchangeService
{

    protected $repository;

    /**
     * CurrencyExchangeService constructor.
     * @param $repository
     */
    public function __construct(CurrencyExchangeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAvailableCurrencies()
    {
        try {
            $rateService = ExchangeRateFactory::Instantiate("exchange_rate");
            return $currencies = $rateService->currencies();
        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
            return collect();
        }

    }

    /**
     * @param $currency
     * @param $startDate
     * @param $endDate
     * @return array
     * @throws \App\Exceptions\ServiceNotFoundException
     */
    public function getExchangeRateWithDateRage($currency, $startDate, $endDate)
    {
        try {

            $currencyRates = $this->repository->getExchangeRateByDates($startDate, $endDate);

            if (!$currencyRates) {
                $rateService = ExchangeRateFactory::Instantiate("exchange_rate");
                $ratesResponse = $rateService->exchangeRateWithDateRage($currency, $startDate, $endDate);
                $currencyRates = $this->repository->storeExchangeRates($ratesResponse, $currency);
            }

            return $this->getSpeceficCurrencyRate($currency, $currencyRates->rates);

        } catch (\Exception $exception) {
            Log::warning($exception->getMessage());
            return redirect()->withErrors($exception->getMessage());
        }
    }

    private function getSpeceficCurrencyRate($currency, $rates)
    {
        $currencyRates = [];
        foreach ($rates as $date => $dateRates) {
            $currencyRates[$date] = $dateRates[$currency];
        }
        return $currencyRates;
    }

    public function getAvgRates($currencyRates)
    {
        $rates = array_values($currencyRates);
        $avg = array_sum($rates) / count($rates);
        return $avg;
    }

    public function listUserCurrencyRateSearches()
    {
        $currencyRates= $this->repository->listUserCurrencyRateSearches();
        foreach ($currencyRates as $currencyRate){
            $rates= $this->getSpeceficCurrencyRate($currencyRate->currency, $currencyRate->rates);
            $currencyRate->avg= $this->getAvgRates($rates);
        }
        return $currencyRates;
    }

    public function deleteCurrencySearch($id)
    {
        return $this->repository->deleteCurrencySearch($id);
    }
}
