<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = \App\Models\Product::orderBy('id', 'desc')->take(8)->get();
        return view('home', compact('products'));
    }

}
