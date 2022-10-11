<?php

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exchange\ExchangeRateDateRange;
use App\Services\CurrencyExchangeService;

class CurrencyExchangeController extends Controller
{
    protected $service;

    /**
     * CurrencyExchangeController constructor.
     * @param CurrencyExchangeService $exchangeService
     */
    public function __construct(CurrencyExchangeService $exchangeService)
    {
        $this->service= $exchangeService;

        $this->middleware("CheckRateSearchBelongsToAuthUser")->only("destroy");
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $userRates= $this->service->listUserCurrencyRateSearches();
        return view('exchange.list',['userRates'=>$userRates]);

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $currencies= $this->service->listAvailableCurrencies();
        return view('exchange.create',['currencies'=>$currencies]);
    }

    /**
     * @param ExchangeRateDateRange $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(ExchangeRateDateRange $request)
    {

        $currencyRates= $this->service->getExchangeRateWithDateRage($request->currency, $request->start_date, $request->end_date );

        $avg= $this->service->getAvgRates($currencyRates);

        return view('exchange.show',['currencyRates'=>$currencyRates, 'currency'=>$request->currency,'avg'=>$avg]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->service->deleteCurrencySearch($id);
        return  redirect(route("currency-exchange.index"));
    }
}
