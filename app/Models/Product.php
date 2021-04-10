<?php

namespace App\Models;

class Product extends Model
{
    public function handlings()
    {
        return $this->hasMany(StockHandling::class);
    }

    public function calculateAmountInStock(): int
    {
        return $this->handlings()->sum('amount');
    }
}
