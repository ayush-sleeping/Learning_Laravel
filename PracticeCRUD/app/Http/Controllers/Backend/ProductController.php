<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        return view('Backend.Products.index', compact('products', 'category'));
    }

    public function create()
    {
        $category = Category::all();
        return view('Backend.Products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        Product::create($data);
        return redirect()->route('backend.products.index')->with('success', 'Product created successfully!');
    }

    public function show(Request $request, Product $product)
    {
        return view('Backend.Products.show', compact('product'));
    }

    public function edit(Request $request, Product $product)
    {
        $category = Category::all();
        return view('Backend.Products.edit', compact('product', 'category'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        $product->update($data);
        return redirect()->route('backend.products.index')->with('success', 'Product updated successfully!');
    }

    public function delete(Product $product)
    {
        return view('Backend.Products.delete', compact('product'));
    }

    public function destroy(Request $request, Product $product)
    {
        //dd(11);
        $product->delete();
        return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully!');
    }
}
