<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Product;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        // Calculate used capacity for each warehouse
        foreach ($warehouses as $warehouse) {
            $usedCapacity = Product::where('location', $warehouse->name)->sum('stock');
            $warehouse->capacity_used = $usedCapacity;
            $warehouse->percentage = $warehouse->capacity > 0 ? round(($usedCapacity / $warehouse->capacity) * 100) : 0;
        }
        return response()->json($warehouses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $warehouse = Warehouse::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'warehouse' => $warehouse]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|string|max:50',
        ]);

        $warehouse = Warehouse::findOrFail($id);
        
        // Also update products location name if the warehouse name changed
        if ($warehouse->name !== $request->name) {
            Product::where('location', $warehouse->name)->update(['location' => $request->name]);
        }
        
        $warehouse->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true, 'warehouse' => $warehouse]);
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        return response()->json(['success' => true]);
    }
}
