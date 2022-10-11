<?php


namespace App\Repositories;


use App\Models\CurrencyRate;

class CurrencyExchangeRepository
{

    public function storeExchangeRates($exchangeRates, $currency)
    {
        return CurrencyRate::updateOrCreate(
            [
                "start_date"=>$exchangeRates['start_date'] , "end_date"=>$exchangeRates['end_date'],"currency"=>$currency,
            ],
            [
                "user_id"=>auth()->id(),
                "start_date"=>$exchangeRates['start_date'] ,
                "end_date"=>$exchangeRates['end_date'],
                "rates"=>$exchangeRates['rates'],
                "currency"=>$currency,
            ]);
    }

    public function getExchangeRateByDates($startDate, $endDate)
    {
        return CurrencyRate::whereDate("start_date",$startDate)->whereDate("end_date",$endDate)->first();
    }


    public function listUserCurrencyRateSearches()
    {
        $userId= auth()->id();

        return CurrencyRate::where("user_id",$userId)->get();
    }

    public function findRateByAuthenticUser($id)
    {
        return CurrencyRate::where('user_id',auth()->id())->whereId($id)->first();
    }

    public function deleteCurrencySearch($id)
    {
        CurrencyRate::whereId($id)->delete();
    }
}
