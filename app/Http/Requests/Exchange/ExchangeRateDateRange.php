<?php

namespace App\Http\Requests\Exchange;

use App\Rules\ValidateCurrency;
use Illuminate\Foundation\Http\FormRequest;

class ExchangeRateDateRange extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "start_date"=>"required|date:d-m-Y|before:end_date",
            "end_date"=>"required|date:d-m-Y|before_or_equal:today",
            'currency' => ["required",new ValidateCurrency],
        ];
    }
}
