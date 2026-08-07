<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['sku' => 'BRG-00123', 'name' => 'Wireless Scanner Zebra', 'category' => 'Elektronik', 'stock' => 45, 'location' => 'Rak C-01', 'brand' => 'Sanco Hsciera', 'origin' => 'Indonesia', 'dimension' => '1000ml', 'spec' => '100 of 02 mm'],
            ['sku' => 'BRG-00124', 'name' => 'Laptop Dell Inspiron', 'category' => 'Elektronik', 'stock' => 28, 'location' => 'Rak B-02', 'brand' => 'Dell Inc.', 'origin' => 'USA', 'dimension' => '15 Inch', 'spec' => 'Core i7 16GB'],
            ['sku' => 'BRG-00125', 'name' => 'Mouse Logitech MX Master', 'category' => 'Elektronik', 'stock' => 45, 'location' => 'Rak C-01', 'brand' => 'Logitech', 'origin' => 'China', 'dimension' => 'Standard', 'spec' => 'Wireless Laser'],
            ['sku' => 'BRG-00126', 'name' => 'Link Cable HighSpeed', 'category' => 'Aksesori', 'stock' => 120, 'location' => 'Rak D-04', 'brand' => 'Link', 'origin' => 'Germany', 'dimension' => '2 Meter', 'spec' => 'HDMI 2.1'],
            ['sku' => 'BRG-00127', 'name' => 'Printer Epson EcoTank', 'category' => 'Elektronik', 'stock' => 12, 'location' => 'Rak A-03', 'brand' => 'Epson', 'origin' => 'Japan', 'dimension' => 'Medium', 'spec' => 'Inkjet Wireless']
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
