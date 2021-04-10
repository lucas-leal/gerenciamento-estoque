<?php

namespace App\Models;

class StockHandling extends Model
{
    public const ORIGIN_SYSTEM = 'system';
    public const ORIGIN_API = 'api';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
