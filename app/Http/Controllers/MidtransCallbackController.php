<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Transaction;

class MidtransCallbackController extends Controller
{
    public function receive(Request $request)
    {
        Log::info('=== MIDTRANS CALLBACK RECEIVED ===');
        Log::info($request->all());

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');

        $notif = new Notification();

        $orderId = $notif->order_id;
        $transactionStatus = $notif->transaction_status;
        $paymentType = $notif->payment_type;
        $fraudStatus = $notif->fraud_status;

        $trx = Transaction::where('order_id', $orderId)->first();

        if (!$trx) {
            Log::error(" Transaksi tidak ditemukan: " . $orderId);
            return response()->json(['message' => 'Order not found'], 404);
        }

        // === UPDATE PAYMENT STATUS ===
        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                if ($fraudStatus == 'challenge') {
                    $trx->payment_status = 'challenge';
                } else {
                    $trx->payment_status = 'success';
                    $trx->status = 'paid';
                }
            }
        } 
        else if ($transactionStatus == 'settlement') {
            $trx->payment_status = 'success';
            $trx->status = 'paid';
        } 
        else if ($transactionStatus == 'pending') {
            $trx->payment_status = 'pending';
        } 
        else if ($transactionStatus == 'deny') {
            $trx->payment_status = 'deny';
            $trx->status = 'failed';
        } 
        else if ($transactionStatus == 'expire') {
            $trx->payment_status = 'expire';
            $trx->status = 'failed';
        } 
        else if ($transactionStatus == 'cancel') {
            $trx->payment_status = 'cancel';
            $trx->status = 'failed';
        }

        $trx->save();

        Log::info("STATUS UPDATED: {$orderId} → {$trx->payment_status}");

        return response()->json(['message' => 'OK']);
    }
}
