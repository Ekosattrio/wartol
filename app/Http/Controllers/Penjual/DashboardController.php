<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total sales (uses transactions.total_amount)
        $totalSales = DB::table('transactions')->sum('total_amount');

        // Total orders
        $totalOrders = DB::table('transactions')->count();

        // Top selling items (sum of qty in transaction_details) join products for name
        $topItems = DB::table('transaction_details')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->select('products.id', 'products.nama_produk', DB::raw('SUM(transaction_details.qty) as total_qty'))
            ->groupBy('products.id', 'products.nama_produk')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

            // Sales for last 7 days (including today)
            $end = Carbon::today()->endOfDay();
            $start = Carbon::today()->subDays(6)->startOfDay();

            $rows = DB::table('transactions')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total'))
                ->whereBetween('created_at', [$start, $end])
                ->groupBy(DB::raw('DATE(created_at)'))
                ->orderBy(DB::raw('DATE(created_at)'))
                ->pluck('total', 'date')
                ->toArray();

            // Build labels and data for the last 7 days in chronological order
            $chartLabels = [];
            $chartData = [];
            for ($d = 6; $d >= 0; $d--) {
                $date = Carbon::today()->subDays($d)->toDateString();
                $chartLabels[] = Carbon::parse($date)->format('d M');
                $chartData[] = isset($rows[$date]) ? (int) $rows[$date] : 0;
            }
        $wartolOpen = Cache::get('wartol_open', true);

        return view('penjual.dashboard', compact('totalSales', 'totalOrders', 'topItems', 'chartLabels', 'chartData', 'wartolOpen'));
    }

    /**
     * Toggle wartol open/close state. Stored in cache key 'wartol_open'.
     */
    public function toggleWartol(Request $request)
    {
        $current = Cache::get('wartol_open', true);
        $new = !$current;
        Cache::forever('wartol_open', $new);

        $label = $new ? 'dibuka' : 'ditutup';
        return redirect()->back()->with('status', "Warteg berhasil {$label}.");
    }
}
