<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // Total sales (uses transactions.total_amount) - only include paid transactions
        $totalSales = Transaction::where('status', 'paid')->sum('total_amount');

        // Total orders - only paid
        $totalOrders = Transaction::where('status', 'paid')->count();

        // Top selling items based on paid transactions only
        $topItems = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->where('transactions.status', 'paid')
            ->select('products.id', 'products.nama_produk', DB::raw('SUM(transaction_details.qty) as total_qty'))
            ->groupBy('products.id', 'products.nama_produk')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

            // Sales for last 7 days (including today)
            $end = Carbon::today()->endOfDay();
            $start = Carbon::today()->subDays(6)->startOfDay();

            // Cities: Sales per date for paid transactions only
            $rows = Transaction::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total'))
                ->whereBetween('created_at', [$start, $end])
                ->where('status', 'paid')
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

        // Ambil 3 pesanan pending terlama untuk widget dasbor
        $oldestPendingOrders = Transaction::where('status', 'pending')->orderBy('created_at', 'asc')->take(3)->get();

        // Ambil semua pesanan pending untuk modal "lihat semua"
        $allPendingOrders = Transaction::where('status', 'pending')->orderBy('created_at', 'asc')->get();

        return view('penjual.dashboard', compact('totalSales', 'totalOrders', 'topItems', 'chartLabels', 'chartData', 'wartolOpen', 'oldestPendingOrders', 'allPendingOrders'));
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
        $request->session()->put('status', "Warteg berhasil {$label}.");
        return redirect()->back();
    }

    public function completeOrder(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->update(['status' => 'completed']);
            $request->session()->put('status', 'Order berhasil diselesaikan.');
            return redirect()->route('penjual.dashboard');
        }

                    $request->session()->put('error', 'Order tidak ditemukan.');
                    return redirect()->route('penjual.dashboard');    }

    public function clearNotifications(Request $request)
    {
        $request->session()->forget(['status', 'error']);
        return response()->json(['status' => 'success']);
    }
}