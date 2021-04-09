<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('product.list', ['products' => $products]);
    }

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

        return redirect()->route('products.list');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.list');
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.delete', ['product' => $product]);
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.list');
    }
}
