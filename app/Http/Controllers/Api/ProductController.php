<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'location' => 'required|string',
            'brand' => 'nullable|string'
        ]);

        $sku = 'BRG-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        while (Product::where('sku', $sku)->exists()) {
            $sku = 'BRG-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        }

        $product = Product::create([
            'sku' => $sku,
            'name' => $validated['name'],
            'category' => $validated['category'],
            'stock' => $validated['stock'],
            'location' => $validated['location'],
            'brand' => $validated['brand'],
            'origin' => 'Local',
            'dimension' => 'Standard',
            'spec' => 'Standard'
        ]);

        return response()->json(['success' => true, 'product' => $product]);
    }

    public function exportCsv()
    {
        $products = Product::all();
        $csvFileName = 'wms_stock_export.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['SKU', 'Name', 'Category', 'Stock', 'Location', 'Brand', 'Origin', 'Dimension', 'Spec']);
        foreach ($products as $row) {
            fputcsv($handle, [$row->sku, $row->name, $row->category, $row->stock, $row->location, $row->brand, $row->origin, $row->dimension, $row->spec]);
        }
        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
