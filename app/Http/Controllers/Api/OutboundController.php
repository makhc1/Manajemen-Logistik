<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outbound;

class OutboundController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipment_number' => 'required|string',
            'customer' => 'required|string',
            'shipment_date' => 'required|date',
            'destination' => 'nullable|string',
            'items' => 'required|array'
        ]);

        foreach ($validated['items'] as $item) {
            $product = Product::where('name', $item['name'])->first(); // Searching by name since mock data uses name, ideally use SKU
            if ($product) {
                if ($product->stock >= $item['qty']) {
                    $product->stock -= $item['qty'];
                    $product->save();
                }
            }
        }

        Outbound::create([
            'shipment_number' => $validated['shipment_number'],
            'customer' => $validated['customer'],
            'shipment_date' => $validated['shipment_date'],
            'destination' => $validated['destination'],
            'items_json' => json_encode($validated['items'])
        ]);

        return response()->json(['success' => true, 'message' => 'Stok berkurang otomatis!']);
    }
}
