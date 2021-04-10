<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Product;
use App\Models\StockHandling;

class StockController extends Controller
{
    public function addForm()
    {
        return view('stock.add');
    }

    public function add(StockRequest $request)
    {
        $this->addStock($request, StockHandling::ORIGIN_SYSTEM);
        return redirect()->route('stock.add.form');
    }

    public function removeForm()
    {
        return view('stock.remove');
    }

    public function remove(StockRequest $request)
    {
        $this->removeStock($request, StockHandling::ORIGIN_SYSTEM);
        return redirect()->route('stock.remove.form');
    }

    public function addStock(StockRequest $request, string $origin = StockHandling::ORIGIN_API)
    {
        $product = Product::where('sku', $request->sku)->firstOrFail();

        $stockHandling = new StockHandling();
        $stockHandling->amount = $request->amount;
        $stockHandling->origin = $origin;

        $product->handlings()->save($stockHandling);
    }

    public function removeStock(StockRequest $request, string $origin = StockHandling::ORIGIN_API)
    {
        $product = Product::where('sku', $request->sku)->firstOrFail();

        $request->validate([
            'amount' => function ($attribute, $value, $fail) use ($product) {
                if ($value > $product->calculateAmountInStock()) {
                    $fail('A quantidade não deve ser maior que o estoque');
                }
            },
        ]);

        $stockHandling = new StockHandling();
        $stockHandling->amount = -$request->amount;
        $stockHandling->origin = $origin;

        $product->handlings()->save($stockHandling);
    }
}
