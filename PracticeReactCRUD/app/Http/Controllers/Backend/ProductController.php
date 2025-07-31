<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Product::all();
        return Inertia::render('products/index', compact('products'));
    }

    public function create()
    {
        return Inertia::render('products/create');
    }

    public function store(Request $request)
    {
        // Validate and store the product data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
        ]);

        // Assuming you have a Product model to handle the storage
          Product::create($validatedData);

        return redirect()->route('backend.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return Inertia::render('products/show', compact('product'));
    }

    public function edit(Product $product){
        return Inertia::render('products/edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
        ]);

        $product->update($validatedData);

        return redirect()->route('backend.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully.');
    }
}
