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
        // Total sales
        $totalSales = Transaction::where(function ($query) {
             $query->where('transactions.status', 'completed');
         })->sum('total_amount');

        // Total orders
        $totalOrders = Transaction::where(function ($query) {
            $query->where('transactions.status', 'completed');
        })->count();

        // Top selling items
        $topItems = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->where(function ($query) {
                $query->where('transactions.status', 'completed');
            })
            ->select('products.id', 'products.nama_produk', DB::raw('SUM(transaction_details.qty) as total_qty'))
            ->groupBy('products.id', 'products.nama_produk')
            ->orderByDesc('total_qty')
            ->limit(5)
            ->get();

        // Sales for last 7 days (including today)
        $end = Carbon::today()->endOfDay();
        $start = Carbon::today()->subDays(6)->startOfDay();

        // Sales per date
        $rows = Transaction::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total'))
            ->whereBetween('created_at', [$start, $end])
            ->where(function ($query) {
                $query->where('status', 'completed');
            })
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

        // Ambil semua order dengan status paid (sudah bayar, belum diselesaikan)
        $oldestPendingOrders = Transaction::where('status', 'paid')
            ->orderBy('created_at', 'asc')
            ->get();
        
        // Untuk kompatibilitas (jika masih ada yang pakai $allPendingOrders di view)
        $allPendingOrders = Transaction::where('status', 'paid')
            ->orderBy('created_at', 'asc')
            ->get();

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
            
            // Untuk AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Order berhasil diselesaikan.']);
            }
            
            $request->session()->put('status', 'Order berhasil diselesaikan.');
            return redirect()->route('penjual.dashboard');
        }

        // Jika AJAX dan tidak ditemukan
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Order tidak ditemukan.'], 404);
        }
        
        $request->session()->put('error', 'Order tidak ditemukan.');
        return redirect()->route('penjual.dashboard');
    }

    public function clearNotifications(Request $request)
    {
        $request->session()->forget(['status', 'error']);
        return response()->json(['status' => 'success']);
    }
}