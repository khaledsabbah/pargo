<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    use HasFactory;

    protected $fillable = ["start_date","end_date", "user_id", "rates", "currency"];
    protected $casts=[
        "rates"=>"array"
    ];

    protected $dates =["start_date","end_date"];
}
