<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Inbound;

class InboundController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku' => 'required|string',
            'name' => 'required|string',
            'category' => 'required|string',
            'qty' => 'required|integer|min:1',
            'location' => 'nullable|string',
            'origin' => 'nullable|string',
            'supplier' => 'nullable|string',
            'receive_date' => 'required|date'
        ]);

        $product = Product::where('sku', $validated['sku'])->first();
        if ($product) {
            $product->stock += $validated['qty'];
            $product->save();
        } else {
            $product = Product::create([
                'sku' => $validated['sku'],
                'name' => $validated['name'],
                'category' => $validated['category'],
                'stock' => $validated['qty'],
                'location' => $validated['location'],
                'origin' => $validated['origin'],
                'brand' => $validated['supplier'],
                'dimension' => '1 Unit',
                'spec' => 'Standard'
            ]);
        }

        Inbound::create([
            'sku' => $validated['sku'],
            'qty' => $validated['qty'],
            'supplier' => $validated['supplier'],
            'receive_date' => $validated['receive_date']
        ]);

        return response()->json(['success' => true, 'message' => 'Stok berhasil diperbarui', 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $inbound = Inbound::findOrFail($id);

        $validated = $request->validate([
            'sku' => 'required|string',
            'qty' => 'required|integer|min:1',
            'supplier' => 'nullable|string',
            'receive_date' => 'required|date'
        ]);

        $inbound->update($validated);

        return response()->json(['success' => true, 'message' => 'Inbound updated successfully', 'inbound' => $inbound]);
    }

    public function destroy($id)
    {
        $inbound = Inbound::findOrFail($id);
        $inbound->delete();

        return response()->json(['success' => true, 'message' => 'Inbound deleted successfully']);
    }
}
