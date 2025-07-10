<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Backend.Categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Backend.Categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate( [
            'name' => 'required|string|max:100',
        ]);

        Category::create($data);
        return redirect()->route('backend.categories.index')->with('success', 'Category created successfully!');
    }

    public function show(Request $request, Category $category)
    {
        return view('Backend.Categories.show', compact('category'));
    }

    public function edit(Request $request, Category $category)
    {
        return view('Backend.Categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $category->update($data);
        return redirect()->route('backend.categories.index')->with('success', 'Category updated successfully!');
    }

    public function delete(Request $request, Category $category)
    {
        return view('Backend.Categories.delete', compact('category'));
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return redirect()->route('backend.categories.index')->with('Success', 'Category deleted successfully');
    }
}
