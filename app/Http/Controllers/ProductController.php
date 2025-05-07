<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(12);

        return view ('products.index', ["products" => $products]);
    }

    public function show($id){
    $product = Product::findOrFail($id);
    return view('products.show', [
        'product' => $product
    ]);
    }

    public function create(){
        return view('products.create');
    }


}
