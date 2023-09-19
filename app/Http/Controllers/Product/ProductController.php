<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);
        $categories = Category::with('products')->get();

        return view('product.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show($productId)
    {
        $product = Product::with('reviews.user', 'category')->find($productId);

        return view('product.show', [
            'product' => $product,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        return response()->json([
            "data" => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validate();

        $product->update($validatedData);

        return response()->json([
            "data" => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            "message" => "Product deleted successfully!",
        ]);
    }
}
