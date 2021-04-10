<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class Product extends Model
{
    private const AMOUNT_LOW_STOCK = 100;

    public function handlings()
    {
        return $this->hasMany(StockHandling::class);
    }

    public function calculateAmountInStock(): int
    {
        return $this->handlings()->sum('amount');
    }

    public static function findInLowStock(): Collection
    {
        $products = self::all();

        $products = $products->filter(function ($product) {
            return $product->calculateAmountInStock() < self::AMOUNT_LOW_STOCK;
        });

        return $products;
    }
}
