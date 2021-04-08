<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => ['required', 'max:45', 'unique:products'],
            'description' => ['required', 'max:255']
        ]);

        $product = new Product();
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();
    }
}
