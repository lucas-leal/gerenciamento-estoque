<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();
    }
}
