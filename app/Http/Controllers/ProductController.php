<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->orderBy('id', 'desc')->paginate(12);

        return view ('products.index', ["products" => $products]);
    }

    public function show($id){
    $product = Product::with('category')->findOrFail($id);
    return view('products.show', [
        'product' => $product
    ]);
    }

    public function create(){
        $categories = Category::all();

        return view('products.create', ["categories" => $categories]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0|max:1000',
            'desc' => 'required|string|min:0|max:1000',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validated);

        return redirect()->route('products');
    }
}