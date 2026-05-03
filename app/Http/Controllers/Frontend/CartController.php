<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }
        
        $cart = $this->getCart();
        return view('frontend.cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->quantity ?? 1;

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        Session::put('cart', $cart);
        Session::flash('success', 'Product added to cart!');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            if ($request->quantity > 0) {
                $cart[$id]['quantity'] = $request->quantity;
            } else {
                unset($cart[$id]);
            }
        }

        Session::put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);
        Session::flash('success', 'Product removed from cart!');

        return redirect()->back();
    }

    public function clear()
    {
        Session::forget('cart');
        Session::flash('success', 'Cart cleared!');

        return redirect()->back();
    }

    public function getCart()
    {
        return Session::get('cart', []);
    }

    public function getCartTotal()
    {
        $cart = $this->getCart();
        $total = 0;
        $itemCount = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $itemCount += $item['quantity'];
        }

        return [
            'total' => $total,
            'itemCount' => $itemCount,
        ];
    }

    public function cartCount()
    {
        $cart = $this->getCart();
        return array_sum(array_column($cart, 'quantity'));
    }
}