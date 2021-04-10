<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;

class StockHandling extends Model
{
    public const ORIGIN_SYSTEM = 'system';
    public const ORIGIN_API = 'api';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function isAddition(): bool
    {
        return $this->amount < 1;
    }

    public function getAbsoluteAmount(): int
    {
        return abs($this->amount);
    }

    public static function findByDate(DateTime $date): Collection
    {
        return self::whereDate('created_at', $date->format('Y-m-d'))->orderBy('created_at')->get();
    }
}
