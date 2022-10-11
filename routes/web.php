<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return  redirect(route("currency-exchange.index"));
});

Route::get('/dashboard', function () {
    return  redirect(route("currency-exchange.index"));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->namespace("App\Http\Controllers\Exchange")->group(function (){
    Route::resource("currency-exchange","CurrencyExchangeController")->except(['edit',"update","show"]);
});
require __DIR__.'/auth.php';
