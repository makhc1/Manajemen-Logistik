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


    public function store(Request )
    {
         = ->validate([
            'sku' => 'required|string|unique:products,sku',
            'name' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'location' => 'required|string',
            'brand' => 'nullable|string'
        ]);

         = Product::create([
            'sku' => ['sku'],
            'name' => ['name'],
            'category' => ['category'],
            'stock' => ['stock'],
            'location' => ['location'],
            'brand' => ['brand'],
            'origin' => 'Local',
            'dimension' => 'Standard',
            'spec' => 'Standard'
        ]);

        return response()->json(['success' => true, 'product' => ]);
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
