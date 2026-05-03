<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('frontend.checkout.index');
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $request->validate([
            'shipping_name' => 'required|string|max:100',
            'shipping_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:gcash,cod,bank_transfer',
        ]);

        $user = Auth::user();
        $cartTotal = $this->calculateCartTotal($cart);

        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => Order::generateOrderNumber(),
            'subtotal' => $cartTotal['subtotal'],
            'tax_amount' => $cartTotal['tax'],
            'shipping_cost' => $cartTotal['shipping'],
            'discount_amount' => 0,
            'total' => $cartTotal['total'],
            'total_quantity' => $cartTotal['itemCount'],
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address ?? $request->shipping_address,
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'notes' => $request->notes,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'product_image' => $item['image'] ?? null,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);

            $product = Product::find($item['product_id']);
            if ($product) {
                $product->decrement('stock_quantity', $item['quantity']);
            }
        }

        Delivery::create([
            'order_id' => $order->id,
            'status' => 'pending',
        ]);

        Session::forget('cart');

        if ($request->payment_method === 'gcash') {
            return redirect()->route('checkout.gcash', $order->id);
        }

        return redirect()->route('checkout.success', $order->id)
            ->with('success', 'Order placed successfully!');
    }

    public function success($id)
    {
        $order = Order::with('items', 'delivery')->findOrFail($id);
        return view('frontend.checkout.success', compact('order'));
    }

    public function gcash($id)
    {
        $order = Order::findOrFail($id);
        return view('frontend.checkout.gcash', compact('order'));
    }

    public function gcashWebhook(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        
        $order->update([
            'payment_status' => 'paid',
            'status' => 'confirmed',
            'paid_at' => now(),
        ]);

        return redirect()->route('checkout.success', $order->id)->with('success', 'Payment confirmed! Thank you for your order.');
    }
    
    public function gcashCod($id)
    {
        $order = Order::findOrFail($id);
        
        $order->update([
            'payment_method' => 'cod',
            'payment_status' => 'pending',
            'status' => 'confirmed',
        ]);

        return redirect()->route('checkout.success', $order->id)->with('success', 'Order confirmed! Pay when you receive your order.');
    }
    
    private function calculateCartTotal($cart)
    {
        $subtotal = 0;
        $itemCount = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $itemCount += $item['quantity'];
        }

        $tax = $subtotal * 0.12;
        $shipping = $subtotal > 500 ? 0 : 50;
        $total = $subtotal + $tax + $shipping;

        return [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
            'itemCount' => $itemCount,
        ];
    }
}