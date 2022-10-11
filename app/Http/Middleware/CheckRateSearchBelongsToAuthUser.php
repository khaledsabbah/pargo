<?php

namespace App\Http\Middleware;

use App\Repositories\CurrencyExchangeRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckRateSearchBelongsToAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $exchangeRate= App::make(CurrencyExchangeRepository::class)->findRateByAuthenticUser($request->route("currency_exchange"));
        if (!$exchangeRate)
            return abort(401);
        return $next($request);
    }
}
