<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $fillable = [
        "s_no",
        "buy_date",
        "qty",
        "symbol",
        "expiration_date",
        "callput",
        "strike_price",
        "stock_price",
        "stock_stoploss",
        "stock_resistance",
        "sell_price",
        "buy_price",
        "sell_date",
        "net",
        "profit",
        "current_price",
        "days_to_expire",
        "status",
    ];
}