<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->products()->orderBy('id', 'desc')->paginate(12);
        return view('categories.show', compact('category', 'products'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:0',
        ]);

        $category = Category::create($validated);

        return redirect()
            ->route('categories.show', $category)
            ->with('success', 'Category Created!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('products')->with('success', 'Category Deleted!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:0',
        ]);

        $category->update($validated);

    return redirect()
        ->route('categories.show', $category)
        ->with('success', 'Category updated!');
    }
}
