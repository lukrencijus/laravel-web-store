<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('products.index', ["products" => $products]);
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create', ["categories" => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'desc' => 'required|string|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $defaultImage = 'images/sample.png';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        } else {
            $validated['image'] = $defaultImage;
        }

        $product = Product::create($validated);

        return redirect()
            ->route('products_show', $product)
            ->with('success', 'Product Created!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && $product->image !== 'images/sample.png') {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products')->with('success', 'Product Deleted!');
    }

    public function edit(Product $product)
    {
        $product->load('category');
        $categories = Category::all();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'desc' => 'required|string|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $defaultImage = 'images/sample.png';

        if ($request->has('remove_image') && $product->image) {
            if ($product->image !== $defaultImage) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $defaultImage;
        }

        if ($request->hasFile('image')) {
            if ($product->image && $product->image !== $defaultImage) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        } elseif (!$request->has('remove_image')) {
            $validated['image'] = $product->image;
        }

        $product->update($validated);

        return redirect()
            ->route('products_show', $product)
            ->with('success', 'Product updated!');
    }
}