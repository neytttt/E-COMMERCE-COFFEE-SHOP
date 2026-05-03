<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $query = Delivery::with('order');

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->whereHas('order', function ($q) use ($request) {
                $q->where('order_number', 'like', '%' . $request->search . '%');
            });
        }

        $deliveries = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.deliveries.index', compact('deliveries'));
    }

    public function show($id)
    {
        $delivery = Delivery::with('order', 'order.items')->findOrFail($id);
        return view('admin.deliveries.show', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,preparing,shipped,in_transit,out_for_delivery,delivered,failed_delivery,returned',
            'carrier' => 'nullable|string|max:100',
            'tracking_number' => 'nullable|string|max:100',
            'delivery_notes' => 'nullable|string',
        ]);

        $data = $request->except(['history']);

        if ($request->status === 'shipped' && $delivery->status !== 'shipped') {
            $data['shipped_at'] = now();
        }

        if ($request->status === 'delivered' && $delivery->status !== 'delivered') {
            $data['delivered_at'] = now();
        }

        if ($request->status !== $delivery->status) {
            $delivery->addHistory($request->status, $request->note ?? 'Status updated');
        }

        $delivery->update($data);

        return redirect()->back()->with('success', 'Delivery updated!');
    }

    public function markShipped(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);

        $request->validate([
            'carrier' => 'required|string|max:100',
            'tracking_number' => 'required|string|max:100',
        ]);

        $delivery->update([
            'carrier' => $request->carrier,
            'tracking_number' => $request->tracking_number,
            'status' => 'shipped',
            'shipped_at' => now(),
        ]);

        $delivery->order->update(['status' => 'shipped']);

        $delivery->addHistory('shipped', 'Order shipped via ' . $request->carrier);

        return redirect()->back()->with('success', 'Order marked as shipped!');
    }

    public function markDelivered($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->markAsDelivered();

        $delivery->order->update([
            'status' => 'delivered',
            'delivered_at' => now(),
        ]);

        $delivery->addHistory('delivered', 'Order delivered');

        return redirect()->back()->with('success', 'Order marked as delivered!');
    }

    public function updateCarrier(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);

        $request->validate([
            'carrier' => 'required|string|max:100',
            'tracking_number' => 'required|string|max:100',
        ]);

        $delivery->update([
            'carrier' => $request->carrier,
            'tracking_number' => $request->tracking_number,
        ]);

        return redirect()->back()->with('success', 'Carrier updated!');
    }
}