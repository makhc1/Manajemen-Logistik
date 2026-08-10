<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function charts()
    {
        // 1. Bar Chart Data (Last 7 Days)
        $barLabels = [];
        $inboundData = [];
        $outboundData = [];

        // Generate the last 7 days labels
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $barLabels[] = $date->format('D'); // e.g., Sun, Mon
            $dateString = $date->toDateString();

            // Fetch Inbound sum for this date
            $inboundSum = Inbound::whereDate('created_at', $dateString)->sum('qty');
            $inboundData[] = (int) $inboundSum;

            // Fetch Outbound sum for this date (from items_json)
            $outboundsForDate = Outbound::whereDate('created_at', $dateString)->get();
            $outboundSum = 0;
            foreach ($outboundsForDate as $ob) {
                $items = json_decode($ob->items_json, true);
                if (is_array($items)) {
                    foreach ($items as $item) {
                        $outboundSum += (int) ($item['qty'] ?? 0);
                    }
                }
            }
            $outboundData[] = (int) $outboundSum;
        }

        // 2. Circle Chart Data (Product Stock by Category)
        $categories = Product::select('category', DB::raw('SUM(stock) as total_stock'))
            ->groupBy('category')
            ->get();

        $pieLabels = [];
        $pieData = [];
        
        foreach ($categories as $cat) {
            $pieLabels[] = $cat->category;
            $pieData[] = (int) $cat->total_stock;
        }

        return response()->json([
            'success' => true,
            'bar_chart' => [
                'labels' => $barLabels,
                'inbound' => $inboundData,
                'outbound' => $outboundData,
            ],
            'circle_chart' => [
                'labels' => $pieLabels,
                'data' => $pieData,
            ]
        ]);
    }
}
