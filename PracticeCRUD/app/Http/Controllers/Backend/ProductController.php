<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $product = new Product($data);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $detinationPath = public_path('/images/products');

            // Create directory if it doesn't exist
            if (!file_exists($detinationPath)) {
                mkdir($detinationPath, 0777, true);
            }

            $image->move($detinationPath, $name);
            $product->image = $name;
        }
        $product->save();

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
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        $product->fill($data);
        if ($request->hasFile('image')){
            // Delete old image if exists
            if ($product->image && file_exists(public_path('/images/products/' . $product->image))) {
                unlink(public_path('/images/products/' . $product->image));
            }
            $image = $request->file('image');
            $name = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $detainationPath = public_path('/images/products');
            $imagePath = $detainationPath . '/' . $name;
            // Create directory if it doesn't exist
            if (!file_exists($detainationPath)) {
                mkdir($detainationPath, 0777, true);
            }
            $image->move($detainationPath, $name);
            $product->image = $name;
        }
        $product->save();

        return redirect()->route('backend.products.index')->with('success', 'Product updated successfully!');
    }

    public function delete(Product $product)
    {
        return view('Backend.Products.delete', compact('product'));
    }

    public function destroy(Request $request, Product $product)
    {
        // Delete image if exists
        if ($product->image && file_exists(public_path('/images/products/' . $product->image))) {
            unlink(public_path('/images/products/' . $product->image));
        }
        $product->delete();

        return redirect()->route('backend.products.index')->with('success', 'Product deleted successfully!');
    }
}
