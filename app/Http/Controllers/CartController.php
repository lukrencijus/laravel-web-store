<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function view()
    {
        $cart = session()->get('cart', []);
        return view('cart.view', compact('cart'));
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function removeQ($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product updated in cart!');
    }
}
